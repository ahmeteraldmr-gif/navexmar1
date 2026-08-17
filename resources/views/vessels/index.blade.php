@extends('layouts.app')

@section('title', 'Filomuz & Operasyonlar | NAVEXMAR')

@php
$vesselFallbackImages = [
    'images/vsl_container.jpg',
    'images/vsl_tanker.jpg',
    'images/vsl_bulk.jpg',
    'images/vsl_roro.jpg',
];
@endphp

@section('content')

<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-ship"></i> {{ __t('Acentelik Portföyü', 'Agency Portfolio') }}</div>
        <h1>{{ __t('Hizmet Verilen Gemiler & Filomuz', 'Attended Vessels & Fleet') }}</h1>
        <p>{{ __t('Türk Boğazları ve Türkiye limanlarında acenteliğini başarıyla yürüttüğümüz ticari gemiler ve deniz operasyonları.', 'Commercial vessels and maritime operations successfully attended in Turkish Straits and all ports of Turkey.') }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container">
        
        <!-- Filter Tabs -->
        @if(isset($vesselTypes) && count($vesselTypes) > 0)
        <div style="display: flex; gap: 8px; margin-bottom: 32px; flex-wrap: wrap; justify-content: center;">
            <a href="{{ route('vessels.index') }}" class="port-tab {{ !request('type') || request('type') == 'all' ? 'active' : '' }}" style="text-decoration:none;">{{ __t('Tümü', 'All') }}</a>
            @foreach($vesselTypes as $type)
                <a href="{{ route('vessels.index', ['type' => $type]) }}" class="port-tab {{ request('type') == $type ? 'active' : '' }}" style="text-decoration:none;">{{ $type }}</a>
            @endforeach
        </div>
        @endif

        <div class="vessel-grid" style="grid-template-columns: repeat(3, 1fr);">
            @forelse($vessels as $index => $vessel)
            @php
                $vslImg = null;
                if (!empty($vessel->image)) {
                    $vslImg = asset(ltrim($vessel->image, '/'));
                } elseif (!empty($vessel->image_path)) {
                    $vslImg = Storage::url($vessel->image_path);
                } else {
                    $vslImg = asset($vesselFallbackImages[$index % count($vesselFallbackImages)]);
                }
            @endphp
            <div class="vessel-card">
                <div class="vessel-img" style="aspect-ratio: 16/10;">
                    <img src="{{ $vslImg }}" alt="{{ $vessel->name }}" loading="lazy">
                </div>
                <div class="vessel-body">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <span class="vessel-type">{{ $vessel->vessel_type ?? $vessel->type ?? 'Gemi' }}</span>
                        <span style="font-size: 0.68rem; font-weight: 700; color: var(--blue); background: var(--sky); padding: 2px 8px; border-radius: 4px;">{{ $vessel->status }}</span>
                    </div>
                    <div class="vessel-name" style="font-size: 1rem; margin-bottom: 10px;">{{ $vessel->name }}</div>
                    
                    <div class="vessel-specs" style="background: var(--bg); padding: 10px 12px; border-radius: var(--r); margin-bottom: 12px; border: 1px solid var(--border);">
                        <div class="vessel-spec"><strong>{{ $vessel->imo_number }}</strong>IMO No</div>
                        <div class="vessel-spec"><strong>{{ number_format($vessel->grt) }}</strong>GRT</div>
                        <div class="vessel-spec" style="grid-column: span 2;"><strong>{{ $vessel->last_port ?? 'Ambarlı' }}</strong>{{ __t('Son Liman', 'Last Port') }}</div>
                    </div>

                    @if($vessel->details)
                        <p style="font-size: 0.78rem; color: var(--muted); line-height: 1.5;">{{ Str::limit($vessel->details, 90) }}</p>
                    @endif
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1; text-align:center; padding:60px 20px; color:var(--muted);">
                <i class="fa-solid fa-ship" style="font-size:2.5rem; margin-bottom:14px; display:block; color:var(--blue); opacity:0.4;"></i>
                <p>{{ __t('Kayıtlı gemi bulunamadı.', 'No vessels found.') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
