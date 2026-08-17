@extends('layouts.app')
@section('title', ($service->title ?? 'Hizmet Detayı') . ' | NAVEXMAR')

@php
$serviceImages = [
    'gemi-acenteligi-liman-hizmetleri'   => 'images/svc_port_agency.jpg',
    'turk-bogazlari-gecis-acenteligi'    => 'images/svc_strait_transit.jpg',
    'yakit-ve-kumanya-ikmali'            => 'images/svc_bunkering.jpg',
    'murettebat-degisimi-kara-lojistigi' => 'images/svc_crew_change.jpg',
    'yuk-ve-konteyner-operasyonlari'     => 'images/svc_cargo.jpg',
    'teknik-survey-bakim-onarim'         => 'images/svc_technical.jpg',
    'teknik-ve-makine-destegi'           => 'images/svc_technical.jpg',
];

$imgSrc = null;
if (!empty($service->image)) {
    $imgSrc = asset(ltrim($service->image, '/'));
} elseif (!empty($service->image_path)) {
    $imgSrc = Storage::url($service->image_path);
} elseif (isset($serviceImages[$service->slug])) {
    $imgSrc = asset($serviceImages[$service->slug]);
} else {
    $imgSrc = asset('images/svc_port_agency.jpg');
}
@endphp

@section('styles')
<style>
.svc-detail-grid { display: grid; grid-template-columns: 1fr 340px; gap: 48px; align-items: start; }
.svc-main-img { border-radius: var(--r); overflow: hidden; aspect-ratio: 16/9; margin-bottom: 32px; border: 1px solid var(--border); box-shadow: var(--shadow); }
.svc-main-img img { width: 100%; height: 100%; object-fit: cover; }
.svc-detail-body h2 { font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 14px; }
.svc-detail-body p { color: var(--muted); line-height: 1.75; margin-bottom: 16px; font-size: 0.92rem; }
.svc-detail-body ul { list-style: none; margin-bottom: 24px; }
.svc-detail-body ul li {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: 0.88rem; color: var(--text); padding: 9px 0; border-bottom: 1px solid var(--border);
}
.svc-detail-body ul li::before { content: '\f00c'; font-family: 'Font Awesome 6 Free'; font-weight: 900; color: var(--teal); flex-shrink: 0; margin-top: 2px; }

.svc-sidebar-card {
    background: white; border: 1px solid var(--border); border-radius: var(--r); padding: 24px; margin-bottom: 20px; box-shadow: var(--shadow);
}
.svc-sidebar-card h4 { font-size: 0.88rem; font-weight: 700; color: var(--navy); margin-bottom: 14px; padding-bottom: 10px; border-bottom: 1px solid var(--border); font-family: 'Inter', sans-serif; }
.svc-other-link {
    display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--border);
    font-size: 0.84rem; color: var(--muted); transition: color 0.2s; text-decoration: none; font-weight: 500;
}
.svc-other-link:last-child { border-bottom: none; }
.svc-other-link:hover, .svc-other-link.active { color: var(--blue); font-weight: 600; }
.svc-other-link i { font-size: 0.7rem; }

.f-contact-item { display: flex; gap: 10px; align-items: center; font-size: 0.84rem; color: var(--text); margin-bottom: 10px; }
.f-contact-item i { color: var(--blue); width: 16px; text-align: center; }

@media(max-width: 1024px){ .svc-detail-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="page-hero">
    <div class="container">
        <div class="page-hero-badge"><i class="fa-solid fa-anchor"></i> Hizmetler</div>
        <h1>{{ $service->title ?? 'Hizmet Detayı' }}</h1>
        <p>{{ $service->short_description ?? $service->summary ?? 'NAVEXMAR profesyonel denizcilik hizmetleri.' }}</p>
    </div>
</div>

<section class="sec sec-alt">
    <div class="container">
        <div class="svc-detail-grid">
            <div>
                <div class="svc-main-img">
                    <img src="{{ $imgSrc }}" alt="{{ $service->title }}" loading="lazy">
                </div>
                <div class="svc-detail-body">
                    {!! $service->description ?? '<p>Bu hizmet hakkında detaylı bilgi almak için bizimle iletişime geçebilirsiniz.</p>' !!}
                </div>
                <div style="margin-top: 36px; display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn-primary"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('PDA Teklif Al', 'Get PDA Quote') }}</a>
                    <a href="{{ route('services.index') }}" class="btn-outline"><i class="fa-solid fa-arrow-left"></i> {{ __t('Tüm Hizmetler', 'All Services') }}</a>
                </div>
            </div>

            <div>
                <div class="svc-sidebar-card">
                    <h4><i class="fa-solid fa-headset" style="color:var(--blue);margin-right:7px;"></i> {{ __t('7/24 Operasyon Destek', '24/7 Operational Support') }}</h4>
                    <div style="font-size:0.82rem;color:var(--muted);margin-bottom:16px;line-height:1.6;">{{ __t('Bu hizmet için teklif almak veya acil operasyon bildiriminde bulunmak için:', 'To request a quote or notify emergency attendance for this service:') }}</div>
                    <div class="f-contact-item"><i class="fa-solid fa-phone"></i><span>+90 212 444 62 83</span></div>
                    <div class="f-contact-item"><i class="fa-solid fa-mobile-screen"></i><span>{{ __t('Acil', 'Emergency') }}: +90 532 700 90 90</span></div>
                    <div class="f-contact-item"><i class="fa-solid fa-envelope"></i><span>ops@navexmar.com</span></div>
                    <a href="{{ route('contact') }}" class="btn-primary" style="width:100%;justify-content:center;margin-top:14px;">
                        <i class="fa-solid fa-envelope"></i> {{ __t('Teklif İste', 'Request Quote') }}
                    </a>
                </div>

                @if(isset($services) && count($services) > 0)
                <div class="svc-sidebar-card">
                    <h4><i class="fa-solid fa-anchor" style="color:var(--blue);margin-right:7px;"></i> {{ __t('Diğer Hizmetlerimiz', 'Our Other Services') }}</h4>
                    @foreach($services as $s)
                    <a href="{{ route('services.show', $s->slug) }}" class="svc-other-link {{ $s->id == $service->id ? 'active' : '' }}">
                        <span>{{ $s->title }}</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                    @endforeach
                </div>
                @endif

                <div class="svc-sidebar-card">
                    <h4><i class="fa-solid fa-certificate" style="color:var(--blue);margin-right:7px;"></i> {{ __t('Sertifikalar', 'Certifications') }}</h4>
                    <div style="display:flex;flex-wrap:wrap;gap:6px;">
                        <span style="background:var(--sky);color:var(--blue);padding:4px 10px;border-radius:4px;font-size:0.72rem;font-weight:600;">BIMCO Member</span>
                        <span style="background:var(--sky);color:var(--blue);padding:4px 10px;border-radius:4px;font-size:0.72rem;font-weight:600;">FONASBA Quality</span>
                        <span style="background:var(--sky);color:var(--blue);padding:4px 10px;border-radius:4px;font-size:0.72rem;font-weight:600;">ISO 9001:2015</span>
                        <span style="background:var(--sky);color:var(--blue);padding:4px 10px;border-radius:4px;font-size:0.72rem;font-weight:600;">DTO {{ __t('Üyesi', 'Member') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
