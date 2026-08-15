<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NAVEXMAR - Gemi Acenteliği & Denizcilik Hizmetleri')</title>
    <meta name="description" content="NAVEXMAR - Türk Boğazları (İstanbul & Çanakkale) geçiş acenteliği ve Türkiye limanlarında 7/24 gemi acenteliği hizmetleri.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --bg-body: #F8FAFC;
            --bg-surface: #FFFFFF;
            --primary-navy: #0F294A;
            --primary-blue: #1D4ED8;
            --accent-blue: #2563EB;
            --accent-soft: #EFF6FF;
            --text-main: #0F172A;
            --text-muted: #475569;
            --text-light: #64748B;
            --border-color: #E2E8F0;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-full: 9999px;
            --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.04);
            --shadow-md: 0 8px 24px rgba(15, 23, 42, 0.08);
            --shadow-hover: 0 16px 36px rgba(29, 78, 216, 0.12);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
            transition: var(--transition);
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--primary-navy);
            color: #E2E8F0;
            padding: 10px 0;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .top-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-left span {
            margin-right: 24px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .top-bar-left i { color: #60A5FA; }

        .top-bar-right a {
            color: #93C5FD;
            font-weight: 600;
        }
        .top-bar-right a:hover { color: #FFFFFF; }

        /* Header Navigation */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.04);
            border-bottom: 1px solid var(--border-color);
            padding: 16px 0;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--primary-navy);
        }

        .brand-logo .logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary-blue), #2563EB);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(29, 78, 216, 0.25);
            animation: pulse-logo 3s infinite ease-in-out;
        }

        @keyframes pulse-logo {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .brand-logo span.text-blue { color: var(--primary-blue); }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .nav-link {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-muted);
            padding: 6px 0;
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-blue);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-blue);
            transition: var(--transition);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        .btn-quote {
            background: linear-gradient(135deg, var(--primary-blue), #2563EB);
            color: #FFFFFF;
            padding: 12px 26px;
            border-radius: var(--radius-full);
            font-weight: 700;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(29, 78, 216, 0.25);
            transition: var(--transition);
        }

        .btn-quote:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(29, 78, 216, 0.35);
            color: #FFFFFF;
        }

        /* Micro-Animations & Cards */
        .section-title-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: var(--radius-full);
            background: var(--accent-soft);
            border: 1px solid #BFDBFE;
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 14px;
        }

        .section-heading {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.25;
            color: var(--primary-navy);
            margin-bottom: 14px;
        }

        .section-description {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 640px;
            margin-bottom: 30px;
        }

        /* Clean Animated Grid Cards */
        .card-hover-animate {
            background: #FFFFFF;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: 28px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .card-hover-animate:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: #93C5FD;
        }

        /* Footer */
        footer {
            background: var(--primary-navy);
            color: #94A3B8;
            padding: 70px 0 30px;
            margin-top: 80px;
            border-top: 4px solid var(--primary-blue);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-about p {
            color: #CBD5E1;
            font-size: 0.95rem;
            margin-top: 16px;
            margin-bottom: 20px;
        }

        .footer-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 20px;
        }

        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a {
            color: #CBD5E1;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .footer-links a:hover {
            color: #60A5FA;
            transform: translateX(4px);
        }

        .footer-contact-item {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            color: #CBD5E1;
            font-size: 0.95rem;
        }
        .footer-contact-item i { color: #60A5FA; font-size: 1.1rem; margin-top: 4px; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #94A3B8;
            font-size: 0.85rem;
        }

        .cert-badge {
            background: rgba(255,255,255,0.08);
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.75rem;
            color: #E2E8F0;
            border: 1px solid rgba(255,255,255,0.15);
        }

        @media (max-width: 992px) {
            .nav-menu { display: none; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 600px) {
            .footer-grid { grid-template-columns: 1fr; }
            .top-bar-left { display: none; }
            .section-heading { font-size: 1.8rem; }
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="top-bar-left">
                <span><i class="fa-solid fa-anchor"></i> 7/24 Vardiyalı Acentelik Hizmeti</span>
                <span><i class="fa-solid fa-headset"></i> Acil Nöbetçi: {{ \App\Models\SiteSetting::get('mobile', '+90 (532) 700 90 90') }}</span>
                <span><i class="fa-solid fa-tower-cell"></i> VHF Ch 16 / Ch 71</span>
            </div>
            <div class="top-bar-right">
                <span><i class="fa-solid fa-envelope"></i> {{ \App\Models\SiteSetting::get('email', 'agency@navexmar.com') }}</span>
                <a href="{{ route('admin.login') }}"><i class="fa-solid fa-user-gear"></i> Acente Paneli</a>
            </div>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="navbar">
        <div class="container nav-content">
            <a href="{{ route('home') }}" class="brand-logo">
                <div class="logo-icon"><i class="fa-solid fa-ship"></i></div>
                <div>NAVEX<span class="text-blue">MAR</span></div>
            </a>

            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Ana Sayfa</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Hakkımızda</a></li>
                <li><a href="{{ route('services.index') }}" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">Hizmetlerimiz</a></li>
                <li><a href="{{ route('straits-ports') }}" class="nav-link {{ request()->routeIs('straits-ports') ? 'active' : '' }}">Boğazlar & Limanlar</a></li>
                <li><a href="{{ route('vessels.index') }}" class="nav-link {{ request()->routeIs('vessels.*') ? 'active' : '' }}">Filomuz</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">İletişim</a></li>
            </ul>

            <div>
                <a href="{{ route('contact') }}#quote-section" class="btn-quote">
                    <i class="fa-solid fa-calculator"></i> TEKLİF AL
                </a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="brand-logo" style="margin-bottom: 16px; color:#FFF;">
                        <div class="logo-icon"><i class="fa-solid fa-ship"></i></div>
                        <div>NAVEX<span style="color:#60A5FA;">MAR</span></div>
                    </div>
                    <p>{{ \App\Models\SiteSetting::get('about_short', 'NAVEXMAR, Türk Boğazları ve tüm Türkiye limanlarında 7/24 uluslararası gemi acenteliği, ikmal, teknik destek ve lojistik hizmetleri vermektedir.') }}</p>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                        <span class="cert-badge">BIMCO Member</span>
                        <span class="cert-badge">FONASBA Certified</span>
                        <span class="cert-badge">ISO 9001:2015</span>
                        <span class="cert-badge">DTO Üyesi</span>
                    </div>
                </div>

                <div>
                    <h4 class="footer-title">Hızlı Bağlantılar</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Ana Sayfa</a></li>
                        <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Kurumsal</a></li>
                        <li><a href="{{ route('services.index') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Hizmetlerimiz</a></li>
                        <li><a href="{{ route('straits-ports') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Boğazlar & Limanlar</a></li>
                        <li><a href="{{ route('vessels.index') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Operasyon Filomuz</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Hizmetlerimiz</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('services.show', 'gemi-acenteligi-liman-hizmetleri') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Gemi Acenteliği</a></li>
                        <li><a href="{{ route('services.show', 'turk-bogazlari-gecis-acenteligi') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Boğaz Geçiş Acenteliği</a></li>
                        <li><a href="{{ route('services.show', 'yakit-ve-kumanya-ikmali') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Bunkering & Kumanya</a></li>
                        <li><a href="{{ route('services.show', 'murettebat-degisimi-kara-lojistigi') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Mürettebat Değişimi</a></li>
                        <li><a href="{{ route('services.show', 'teknik-survey-bakim-onarim') }}"><i class="fa-solid fa-chevron-right" style="font-size: 0.75rem;"></i> Sualtı & Teknik Sörvey</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Genel Merkez & 7/24 İletişim</h4>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>{{ \App\Models\SiteSetting::get('address', 'Marport Plaza Kat:8, Ambarlı Liman Yolu, Avcılar / İstanbul') }}</div>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <div>{{ \App\Models\SiteSetting::get('phone', '+90 (212) 444 62 83') }}</div>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-headset"></i>
                        <div>7/24 Nöbetçi: {{ \App\Models\SiteSetting::get('mobile', '+90 (532) 700 90 90') }}</div>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-envelope"></i>
                        <div>{{ \App\Models\SiteSetting::get('email', 'agency@navexmar.com') }}</div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div>&copy; {{ date('Y') }} NAVEXMAR Maritime & Port Agency Inc. Tüm hakları saklıdır.</div>
                <div>NAVEXMAR Kurumsal Denizcilik Portalı</div>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
