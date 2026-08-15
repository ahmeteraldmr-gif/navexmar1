@extends('layouts.app')

@section('title', 'Hizmetlerimiz - NAVEXMAR Gemi Acenteliği')

@section('styles')
<style>
    .service-card-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .service-card {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }

    .service-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-hover);
        border-color: #93C5FD;
    }

    .service-card-img-wrapper {
        position: relative;
        height: 210px;
        overflow: hidden;
    }

    .service-card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .service-card:hover .service-card-img-wrapper img {
        transform: scale(1.06);
    }

    .service-card-badge {
        position: absolute;
        bottom: -22px;
        right: 24px;
        width: 46px;
        height: 46px;
        background: var(--primary-blue);
        border: 3px solid #FFFFFF;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFFFFF;
        font-size: 1.2rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .service-card-body {
        padding: 28px 24px 24px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .service-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-navy);
        margin-bottom: 10px;
    }

    .service-card-text {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 20px;
        flex: 1;
    }

    .feature-tag-list {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-bottom: 20px;
    }

    .feature-tag {
        background: var(--accent-soft);
        color: var(--primary-blue);
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
    }

    .service-card-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-blue);
        font-weight: 700;
        font-size: 0.9rem;
    }

    .service-card:hover .service-card-btn i {
        transform: translateX(4px);
    }

    @media (max-width: 992px) {
        .service-card-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

    <!-- Header Banner -->
    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 70px 0 50px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-ship"></i> Acentelik Çözümleri</div>
            <h1 class="section-heading" style="font-size: 2.6rem; color: #FFF;">Profesyonel Hizmetlerimiz</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">Türk Boğazları ve Türkiye limanlarında 7/24 kesintisiz gemi acenteliği çözümleri.</p>
        </div>
    </div>

    <!-- Clean 3-Column Visual Grid -->
    <div class="container" style="padding: 70px 0 90px;">
        <div class="service-card-grid">
            @foreach($services as $service)
            <div class="service-card">
                <div class="service-card-img-wrapper">
                    <img src="{{ $service->image }}" alt="{{ $service->title }}">
                    <div class="service-card-badge">
                        <i class="fa-solid {{ $service->icon }}"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-card-title">{{ $service->title }}</h3>
                    <p class="service-card-text">{{ $service->summary }}</p>

                    @if($service->features && count($service->features) > 0)
                    <div class="feature-tag-list">
                        @foreach(array_slice($service->features, 0, 3) as $ft)
                            <span class="feature-tag"><i class="fa-solid fa-check"></i> {{ $ft }}</span>
                        @endforeach
                    </div>
                    @endif

                    <div>
                        <a href="{{ route('services.show', $service->slug) }}" class="service-card-btn">
                            Detaylı İncele <i class="fa-solid fa-arrow-right" style="transition: transform 0.2s ease;"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
