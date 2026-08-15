@extends('layouts.app')

@section('title', $service->title . ' - NAVEXMAR')

@section('content')

    <div style="background: linear-gradient(135deg, #0F294A 0%, #1E3E62 100%); padding: 80px 0 60px; color: #FFF; text-align: center;">
        <div class="container">
            <div class="section-title-badge" style="background: rgba(255,255,255,0.15); color: #FFF; border-color: rgba(255,255,255,0.2);"><i class="fa-solid {{ $service->icon }}"></i> NAVEXMAR Service</div>
            <h1 class="section-heading" style="font-size: 2.8rem; color: #FFF;">{{ $service->title }}</h1>
            <p class="section-description" style="margin: 0 auto; color: #E2E8F0;">{{ $service->summary }}</p>
        </div>
    </div>

    <div class="container" style="padding: 80px 0;">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <div>
                <img src="{{ $service->image }}" alt="{{ $service->title }}" style="width: 100%; height: 380px; object-fit: cover; border-radius: var(--radius-lg); border: 1px solid var(--border-color); margin-bottom: 30px; box-shadow: var(--shadow-sm);">

                <h2 style="font-size: 1.7rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 16px;">Hizmet Kapsamı & Detaylar</h2>
                <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 30px; white-space: pre-line;">
                    {{ $service->description }}
                </p>

                @if($service->features && count($service->features) > 0)
                <h3 style="font-size: 1.3rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 20px;">Öne Çıkan Özellikler & Avantajlar</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 40px;">
                    @foreach($service->features as $feature)
                    <div style="background: #FFFFFF; padding: 16px 20px; border-radius: 10px; border: 1px solid var(--border-color); display: flex; align-items: center; gap: 12px; color: var(--text-main); font-weight: 600; box-shadow: var(--shadow-sm);">
                        <i class="fa-solid fa-circle-check" style="color: var(--primary-blue); font-size: 1.2rem;"></i>
                        <span>{{ $feature }}</span>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div>
                <div class="white-card" style="margin-bottom: 30px;">
                    <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 20px;">Diğer Hizmetlerimiz</h3>
                    <ul style="list-style: none;">
                        @foreach($allServices as $other)
                        <li style="margin-bottom: 10px;">
                            <a href="{{ route('services.show', $other->slug) }}" style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; background: #F8FAFC; border-radius: 8px; color: var(--text-muted); font-size: 0.9rem; border: 1px solid var(--border-color);">
                                <span><i class="fa-solid {{ $other->icon }}" style="color: var(--primary-blue); margin-right: 8px;"></i> {{ $other->title }}</span>
                                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="white-card" style="text-align: center;">
                    <i class="fa-solid fa-headset" style="font-size: 2.2rem; color: var(--primary-blue); margin-bottom: 14px;"></i>
                    <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--primary-navy); margin-bottom: 8px;">Teklif Almak İster misiniz?</h3>
                    <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">Geminiz için anında CTP / Proforma maliyet analizi hazırlıyoruz.</p>
                    <a href="{{ route('contact') }}#quote-section" class="btn-primary" style="width: 100%; justify-content: center;">
                        <i class="fa-solid fa-calculator"></i> Teklif İste
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
