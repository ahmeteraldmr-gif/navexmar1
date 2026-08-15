@extends('layouts.app')

@section('title', 'NAVEXMAR - Türk Boğazları & Türkiye Limanları Gemi Acenteliği')

@section('styles')
<style>
    /* Hero Section */
    .hero {
        position: relative;
        padding: 80px 0 90px;
        background: linear-gradient(135deg, #F0F7FF 0%, #E0F2FE 50%, #FFFFFF 100%);
        border-bottom: 1px solid var(--border-color);
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 50px;
        align-items: center;
    }

    .hero-title {
        font-size: 3.2rem;
        font-weight: 800;
        line-height: 1.18;
        color: var(--primary-navy);
        margin-bottom: 18px;
        letter-spacing: -0.5px;
    }

    .hero-title span.highlight {
        color: var(--primary-blue);
    }

    .hero-subtitle {
        font-size: 1.1rem;
        color: var(--text-muted);
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .hero-cta-group {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue), #2563EB);
        color: #FFF;
        padding: 14px 30px;
        border-radius: var(--radius-full);
        font-weight: 700;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 16px rgba(29, 78, 216, 0.25);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(29, 78, 216, 0.35);
        color: #FFF;
    }

    .btn-secondary {
        background: #FFFFFF;
        border: 1px solid #CBD5E1;
        color: var(--primary-navy);
        padding: 14px 30px;
        border-radius: var(--radius-full);
        font-weight: 700;
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    .btn-secondary:hover {
        border-color: var(--primary-blue);
        color: var(--primary-blue);
        background: #F8FAFC;
    }

    /* Live Vessel Tracker Card */
    .tracker-card {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        padding: 24px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .tracker-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border-color);
    }

    .status-live {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #DCFCE7;
        color: #15803D;
        padding: 4px 10px;
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 700;
    }

    .pulse-dot {
        width: 8px;
        height: 8px;
        background-color: #16A34A;
        border-radius: 50%;
    }

    /* Stats Bar */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: -40px;
        position: relative;
        z-index: 10;
    }

    .stat-card {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        padding: 22px;
        text-align: center;
        box-shadow: 0 6px 20px rgba(15, 23, 42, 0.05);
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-hover);
        border-color: #93C5FD;
    }

    .stat-icon {
        font-size: 1.5rem;
        color: var(--primary-blue);
        margin-bottom: 8px;
    }

    .stat-number {
        font-size: 2.1rem;
        font-weight: 800;
        color: var(--primary-navy);
        margin-bottom: 2px;
    }

    .stat-label {
        font-size: 0.85rem;
        color: var(--text-muted);
        font-weight: 600;
    }

    /* Services Cards Grid */
    .services-grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 30px;
    }

    .home-service-card {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }

    .home-service-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-hover);
        border-color: #93C5FD;
    }

    .home-service-img {
        height: 180px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .home-service-card:hover .home-service-img {
        transform: scale(1.05);
    }

    .home-service-body {
        padding: 22px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .home-service-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--primary-navy);
        margin-bottom: 8px;
    }

    .home-service-desc {
        font-size: 0.88rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin-bottom: 16px;
        flex: 1;
    }

    /* Straits Banner */
    .straits-banner {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: var(--radius-lg);
        padding: 36px;
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 30px;
        align-items: center;
        box-shadow: var(--shadow-sm);
        margin: 60px 0 80px;
    }

    @media (max-width: 992px) {
        .hero-grid, .straits-banner { grid-template-columns: 1fr; }
        .stats-container { grid-template-columns: repeat(2, 1fr); margin-top: 20px; }
        .services-grid-3 { grid-template-columns: 1fr; }
        .hero-title { font-size: 2.2rem; }
    }
</style>
@endsection

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-grid">
            <div>
                <div class="section-title-badge">
                    <i class="fa-solid fa-anchor"></i> 7/24 Kesintisiz Gemi Acenteliği
                </div>
                <h1 class="hero-title">
                    Denizcilikte <span class="highlight">Güven</span>, Boğazlarda <span class="highlight">Uzmanlık</span>
                </h1>
                <p class="hero-subtitle">
                    Türk Boğazları transit geçişlerinde ve Türkiye limanlarında armatör ve kiracılara 7/24 profesyonel acentelik çözümleri.
                </p>
                <div class="hero-cta-group">
                    <a href="#quote-section" class="btn-primary">
                        <i class="fa-solid fa-calculator"></i> Teklif Al
                    </a>
                    <a href="{{ route('straits-ports') }}" class="btn-secondary">
                        <i class="fa-solid fa-compass"></i> Boğaz Geçiş Rehberi
                    </a>
                </div>
            </div>

            <!-- Live Vessel Tracker Card -->
            <div class="tracker-card">
                <div class="tracker-header">
                    <div>
                        <h4 style="font-weight: 700; color: var(--primary-navy);">Canlı Operasyon Panosu</h4>
                        <div style="font-size: 0.78rem; color: var(--text-light);">Türk Boğazları & Liman Takibi</div>
                    </div>
                    <div class="status-live">
                        <div class="pulse-dot"></div> CANLI TAKİP
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <div style="background: #F8FAFC; padding: 12px 14px; border-radius: 8px; border-left: 3px solid var(--primary-blue);">
                        <div style="display: flex; justify-content: space-between; font-weight: 700; font-size: 0.85rem; color: var(--primary-navy);">
                            <span>MT Anatolian Pride</span>
                            <span style="color: var(--primary-blue);">Boğaz Transit</span>
                        </div>
                        <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 2px;">
                            İstanbul Boğazı / Kılavuz Kaptan Gemide
                        </div>
                    </div>

                    <div style="background: #F8FAFC; padding: 12px 14px; border-radius: 8px; border-left: 3px solid #2563EB;">
                        <div style="display: flex; justify-content: space-between; font-weight: 700; font-size: 0.85rem; color: var(--primary-navy);">
                            <span>MV Bosphorus Express</span>
                            <span style="color: #2563EB;">Ambarlı Limanı</span>
                        </div>
                        <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 2px;">
                            Marport Terminali / 3.400 TEU Yükleme
                        </div>
                    </div>

                    <div style="background: #F8FAFC; padding: 12px 14px; border-radius: 8px; border-left: 3px solid #D97706;">
                        <div style="display: flex; justify-content: space-between; font-weight: 700; font-size: 0.85rem; color: var(--primary-navy);">
                            <span>MV Danube Star</span>
                            <span style="color: #D97706;">Mürettebat Değişimi</span>
                        </div>
                        <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 2px;">
                            Ahırkapı Demir Sahası / 6 Personel Transferi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <div class="container">
        <div class="stats-container">
            <div class="stat-card">
                <i class="fa-solid fa-ship stat-icon"></i>
                <div class="stat-number">1.450+</div>
                <div class="stat-label">Hizmet Verilen Gemi</div>
            </div>
            <div class="stat-card">
                <i class="fa-solid fa-compass stat-icon"></i>
                <div class="stat-number">3.800+</div>
                <div class="stat-label">Boğaz Geçiş Operasyonu</div>
            </div>
            <div class="stat-card">
                <i class="fa-solid fa-gas-pump stat-icon"></i>
                <div class="stat-number">250.000+</div>
                <div class="stat-label">Ton İkmal (Bunkering)</div>
            </div>
            <div class="stat-card">
                <i class="fa-solid fa-award stat-icon"></i>
                <div class="stat-number">18 Yıl</div>
                <div class="stat-label">Sektörel Deneyim</div>
            </div>
        </div>
    </div>

    <!-- Featured Services Section -->
    <section style="padding: 80px 0 60px;">
        <div class="container">
            <div style="text-align: center; margin-bottom: 30px;">
                <div class="section-title-badge"><i class="fa-solid fa-ship"></i> Acentelik Çözümleri</div>
                <h2 class="section-heading">Öne Çıkan Hizmetlerimiz</h2>
            </div>

            <div class="services-grid-3">
                @foreach($services as $service)
                <div class="home-service-card">
                    <div style="overflow: hidden;">
                        <img src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset(ltrim($service->image, '/')) }}" alt="{{ $service->title }}" class="home-service-img">
                    </div>
                    <div class="home-service-body">
                        <h3 class="home-service-title">{{ $service->title }}</h3>
                        <p class="home-service-desc">{{ $service->summary }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" style="color: var(--primary-blue); font-weight: 700; font-size: 0.88rem; display: inline-flex; align-items: center; gap: 6px;">
                            Detay <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Straits Guide Banner -->
    <div class="container">
        <div class="straits-banner">
            <div>
                <div class="section-title-badge"><i class="fa-solid fa-compass"></i> Rehber</div>
                <h2 style="font-size: 1.6rem; font-weight: 800; color: var(--primary-navy); margin-bottom: 10px;">Türk Boğazları Transit Geçiş Rehberi</h2>
                <p style="color: var(--text-muted); margin-bottom: 20px; font-size: 0.95rem;">
                    İstanbul ve Çanakkale Boğazı SP-1 / SP-2 bildirim zamanları, maksimum draft kısıtlamaları ve VHF rehberi.
                </p>
                <a href="{{ route('straits-ports') }}" class="btn-primary" style="padding: 10px 24px; font-size: 0.9rem;">
                    <i class="fa-solid fa-book-open"></i> Rehberi Oku
                </a>
            </div>
            <div>
                <img src="{{ asset('images/strait_transit.jpg') }}" alt="Boğaz Geçişi" style="width: 100%; height: 200px; object-fit: cover; border-radius: var(--radius-md);">
            </div>
        </div>
    </div>

    <!-- Interactive Quote Section -->
    <section id="quote-section" style="padding: 70px 0; background: #F1F5F9; border-top: 1px solid var(--border-color);">
        <div class="container">
            <div style="max-width: 780px; margin: 0 auto; background: #FFFFFF; border-radius: var(--radius-lg); padding: 32px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <div style="text-align: center; margin-bottom: 24px;">
                    <div class="section-title-badge"><i class="fa-solid fa-calculator"></i> Hızlı Teklif</div>
                    <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--primary-navy);">Acentelik / Proforma Maliyet Talebi</h2>
                </div>

                @if(session('quote_success'))
                    <div style="background: #DCFCE7; border: 1px solid #86EFAC; color: #15803D; padding: 14px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-weight: 600;">
                        <i class="fa-solid fa-circle-check"></i> {{ session('quote_success') }}
                    </div>
                @endif

                <form action="{{ route('quote.send') }}" method="POST">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                        <div>
                            <input type="text" name="company_name" placeholder="Firma / Armatör Adı" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div>
                            <input type="text" name="contact_person" placeholder="Yetkili İsim" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="E-Posta" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Telefon" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div>
                            <input type="text" name="vessel_name" placeholder="Gemi Adı" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                        <div>
                            <select name="vessel_type" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                                <option value="Konteyner Gemisi">Konteyner Gemisi</option>
                                <option value="Ham Petrol / Ürün Tankeri">Tanker</option>
                                <option value="Dökme Yük (Bulk Carrier)">Dökme Yük</option>
                                <option value="Ro-Ro">Ro-Ro</option>
                            </select>
                        </div>
                        <div>
                            <select name="port_or_strait" required style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                                <option value="İstanbul Boğazı Transit">İstanbul Boğazı</option>
                                <option value="Çanakkale Boğazı Transit">Çanakkale Boğazı</option>
                                <option value="Ambarlı Limanı">Ambarlı Limanı</option>
                                <option value="İzmit Körfezi">İzmit Körfezi</option>
                            </select>
                        </div>
                        <div>
                            <input type="date" name="eta_date" style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;">
                        </div>
                    </div>

                    <div style="margin-bottom: 16px;">
                        <textarea name="notes" rows="2" placeholder="Özel talepler (Bunkering, Crew Change, vb.)..." style="width: 100%; padding: 11px; background: #FFFFFF; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 0.9rem;"></textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 12px;">
                        <i class="fa-solid fa-paper-plane"></i> Proforma Teklif Talebini Gönder
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
