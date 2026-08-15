@extends('layouts.app')

@section('title', 'Filomuz & Operasyonlar - NAVEXMAR')

@section('content')

    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-water-ladder"></i> Acentelik Portföyü</div>
            <h1 class="section-heading" style="font-size: 2.8rem; color: #FFF;">Hizmet Verilen Gemiler & Filomuz</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">Türk Boğazları ve limanlarında acenteliğini başarıyla yürüttüğümüz ticari gemiler ve yat operasyonları.</p>
        </div>
    </div>

    <div class="container" style="padding: 80px 0;">
        
        <!-- Filter Tabs -->
        <div style="display: flex; gap: 12px; margin-bottom: 40px; flex-wrap: wrap; justify-content: center;">
            <a href="{{ route('vessels.index') }}" class="btn-secondary" style="{{ !request('type') || request('type') == 'all' ? 'background: var(--primary-blue); color: #FFF; border-color: var(--primary-blue);' : '' }}">Tümü</a>
            @foreach($vesselTypes as $type)
                <a href="{{ route('vessels.index', ['type' => $type]) }}" class="btn-secondary" style="{{ request('type') == $type ? 'background: var(--primary-blue); color: #FFF; border-color: var(--primary-blue);' : '' }}">{{ $type }}</a>
            @endforeach
        </div>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            @foreach($vessels as $vessel)
            <div class="white-card" style="padding: 0; overflow: hidden;">
                <div style="position: relative;">
                    <img src="{{ $vessel->image }}" alt="{{ $vessel->name }}" style="width: 100%; height: 220px; object-fit: cover;">
                    <span style="position: absolute; top: 16px; right: 16px; background: #FFFFFF; color: var(--primary-blue); padding: 4px 12px; border-radius: var(--radius-full); font-size: 0.75rem; font-weight: 700; box-shadow: var(--shadow-sm);">
                        {{ $vessel->status }}
                    </span>
                </div>
                <div style="padding: 24px;">
                    <div style="font-size: 0.8rem; color: var(--text-light); text-transform: uppercase; font-weight: 700;">{{ $vessel->vessel_type }} • {{ $vessel->flag }}</div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary-navy); margin: 6px 0 12px;">{{ $vessel->name }}</h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; font-size: 0.85rem; color: var(--text-muted); margin-bottom: 16px; background: #F8FAFC; padding: 12px; border-radius: 8px; border: 1px solid var(--border-color);">
                        <div>IMO: <strong style="color: var(--text-main);">{{ $vessel->imo_number }}</strong></div>
                        <div>GRT: <strong style="color: var(--text-main);">{{ number_format($vessel->grt) }}</strong></div>
                        <div style="grid-column: span 2;">Son Liman: <strong style="color: var(--primary-blue);">{{ $vessel->last_port }}</strong></div>
                    </div>

                    <p style="font-size: 0.85rem; color: var(--text-light); line-height: 1.5;">{{ $vessel->details }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top: 40px;">
            {{ $vessels->links() }}
        </div>
    </div>

@endsection
