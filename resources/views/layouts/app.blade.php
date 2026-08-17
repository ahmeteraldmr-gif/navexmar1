<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NAVEXMAR — ' . __t('Türk Boğazları Gemi Acenteliği', 'Turkish Straits Shipping Agency'))</title>
    <meta name="description" content="NAVEXMAR — {{ __t('Türk Boğazları ve Türkiye limanlarında 7/24 profesyonel gemi acenteliği, liman hizmetleri, bunkering ve deniz lojistiği.', '24/7 Professional shipping agency, port services, bunkering and maritime logistics in Turkish Straits and Turkish ports.') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        :root {
            --navy:   #0B2545;
            --blue:   #1565C0;
            --blue-m: #1976D2;
            --blue-l: #2196F3;
            --sky:    #E3F2FD;
            --white:  #FFFFFF;
            --bg:     #F5F7FA;
            --border: #DDE3EC;
            --text:   #1A2B3C;
            --muted:  #5A6A7E;
            --teal:   #00897B;
            --r:      8px;
            --ease:   cubic-bezier(0.4,0,0.2,1);
            --shadow: 0 2px 12px rgba(11,37,69,0.08);
            --shadow-lg: 0 8px 32px rgba(11,37,69,0.12);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--white);
            color: var(--text);
            overflow-x: hidden;
            font-size: 0.93rem;
            line-height: 1.65;
        }

        a { text-decoration: none; color: inherit; }
        img { display: block; }

        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
            color: var(--navy);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ── TOP BAR ── */
        .topbar {
            background: var(--navy);
            padding: 7px 0;
        }
        .topbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .topbar-left {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .topbar-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            color: rgba(255,255,255,0.8);
        }
        .topbar-item i { color: #90CAF9; font-size: 0.72rem; }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .topbar-live {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.72rem;
            color: #A5D6A7;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .dot-live {
            width: 6px; height: 6px;
            background: #4CAF50;
            border-radius: 50%;
            animation: blink 1.5s ease-in-out infinite;
        }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

        /* Lang Switcher */
        .lang-switcher {
            display: inline-flex;
            align-items: center;
            gap: 2px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            padding: 2px 6px;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 700;
        }
        .lang-btn {
            color: rgba(255,255,255,0.65);
            padding: 2px 6px;
            border-radius: 4px;
            transition: color 0.15s, background 0.15s;
        }
        .lang-btn:hover { color: #FFFFFF; }
        .lang-btn.active {
            color: #FFFFFF;
            background: var(--blue);
        }
        .lang-sep { color: rgba(255,255,255,0.3); font-size: 0.7rem; }

        /* ── NAVBAR ── */
        .nav {
            background: var(--white);
            border-bottom: 2px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 900;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }
        .nav-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-logo-icon {
            width: 40px; height: 40px;
            background: var(--navy);
            border-radius: var(--r);
            display: grid;
            place-items: center;
            color: white;
            font-size: 1rem;
        }
        .nav-logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--navy);
            letter-spacing: -0.3px;
        }
        .nav-logo-text span { color: var(--blue); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2px;
            list-style: none;
        }
        .nav-links a {
            display: block;
            padding: 8px 13px;
            font-size: 0.84rem;
            font-weight: 500;
            color: var(--muted);
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
        }
        .nav-links a:hover {
            color: var(--navy);
            background: var(--sky);
        }
        .nav-links a.active {
            color: var(--blue);
            font-weight: 600;
            background: var(--sky);
        }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--blue);
            color: white !important;
            padding: 9px 20px;
            border-radius: var(--r);
            font-size: 0.84rem;
            font-weight: 600;
            transition: background 0.2s, transform 0.15s;
        }
        .nav-cta:hover { background: var(--navy); transform: translateY(-1px); }

        .nav-hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none; border: none;
            cursor: pointer; padding: 4px;
        }
        .nav-hamburger span {
            display: block;
            width: 22px; height: 2px;
            background: var(--navy); border-radius: 2px;
        }

        /* Mobile drawer */
        .mob-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.4); z-index: 1000;
        }
        .mob-drawer {
            position: fixed; top: 0; right: -300px;
            width: 280px; height: 100%;
            background: var(--white);
            border-left: 1px solid var(--border);
            z-index: 1001;
            transition: right 0.3s var(--ease);
            padding: 24px 20px;
            display: flex; flex-direction: column; gap: 0;
        }
        .mob-drawer.open { right: 0; }
        .mob-overlay.open { display: block; }
        .mob-close {
            background: none; border: none;
            font-size: 1.3rem; color: var(--muted);
            cursor: pointer; align-self: flex-end;
            margin-bottom: 20px;
        }
        .mob-links { list-style: none; display: flex; flex-direction: column; gap: 2px; flex: 1; }
        .mob-links a {
            display: flex; align-items: center; gap: 10px;
            padding: 11px 14px; border-radius: 6px;
            color: var(--text); font-size: 0.9rem; font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .mob-links a:hover { background: var(--sky); color: var(--blue); }
        .mob-links a i { color: var(--blue); width: 16px; }

        /* ── PAGE HERO BANNER ── */
        .page-hero {
            background: var(--navy);
            padding: 52px 0 44px;
        }
        .page-hero-badge {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(255,255,255,0.1);
            color: #90CAF9;
            padding: 4px 14px; border-radius: 99px;
            font-size: 0.73rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.8px;
            margin-bottom: 14px;
        }
        .page-hero h1 {
            font-size: clamp(1.5rem, 2.8vw, 2.2rem);
            font-weight: 700; color: white;
            margin-bottom: 10px; letter-spacing: -0.3px;
        }
        .page-hero p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem; max-width: 520px;
        }

        /* ── SECTIONS ── */
        .sec { padding: 64px 0; }
        .sec-alt { background: var(--bg); }
        .sec-label {
            display: inline-flex; align-items: center; gap: 7px;
            color: var(--blue); font-size: 0.72rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 1.2px;
            margin-bottom: 8px;
        }
        .sec-label::before {
            content: ''; display: block;
            width: 16px; height: 2px;
            background: var(--blue); border-radius: 2px;
        }
        .sec-title {
            font-size: clamp(1.3rem, 2.2vw, 1.85rem);
            font-weight: 700; color: var(--navy);
            letter-spacing: -0.3px; margin-bottom: 8px;
        }
        .sec-sub {
            color: var(--muted); font-size: 0.88rem;
            max-width: 500px; line-height: 1.7;
        }

        /* ── CARDS ── */
        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--r);
            overflow: hidden;
            transition: box-shadow 0.25s var(--ease), transform 0.25s var(--ease);
        }
        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-3px);
        }

        /* ── BUTTONS ── */
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--blue); color: white !important;
            padding: 11px 24px; border-radius: var(--r);
            font-weight: 600; font-size: 0.87rem;
            border: none; cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
        }
        .btn-primary:hover { background: var(--navy); transform: translateY(-1px); box-shadow: 0 4px 16px rgba(21,101,192,0.25); }

        .btn-outline {
            display: inline-flex; align-items: center; gap: 8px;
            background: transparent; color: var(--navy) !important;
            padding: 10px 22px; border-radius: var(--r);
            font-weight: 600; font-size: 0.87rem;
            border: 2px solid var(--navy); cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .btn-outline:hover { background: var(--navy); color: white !important; }

        .btn-outline-white {
            display: inline-flex; align-items: center; gap: 8px;
            background: transparent; color: white !important;
            padding: 10px 22px; border-radius: var(--r);
            font-weight: 600; font-size: 0.87rem;
            border: 2px solid rgba(255,255,255,0.6); cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }
        .btn-outline-white:hover { background: rgba(255,255,255,0.12); border-color: white; }

        /* ── FOOTER ── */
        .footer { background: var(--navy); padding: 56px 0 28px; }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.1fr;
            gap: 40px;
            margin-bottom: 44px;
        }
        .footer-logo {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 14px;
        }
        .footer-logo-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.12);
            border-radius: 6px; display: grid; place-items: center;
            color: white; font-size: 0.9rem;
        }
        .footer-logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 800; font-size: 1.1rem;
            color: white; letter-spacing: -0.2px;
        }
        .footer-logo-text span { color: #90CAF9; }
        .footer-about-p { color: rgba(255,255,255,0.55); font-size: 0.82rem; line-height: 1.7; margin-bottom: 16px; }
        .footer-certs { display: flex; flex-wrap: wrap; gap: 6px; }
        .footer-cert {
            background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.6);
            padding: 3px 10px; border-radius: 4px;
            font-size: 0.68rem; font-weight: 600; border: 1px solid rgba(255,255,255,0.1);
        }

        .footer-col h5 {
            font-family: 'Inter', sans-serif; font-weight: 700;
            color: white; font-size: 0.84rem;
            margin-bottom: 14px; padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .footer-nav { list-style: none; }
        .footer-nav li { margin-bottom: 8px; }
        .footer-nav a {
            color: rgba(255,255,255,0.55); font-size: 0.82rem;
            display: inline-flex; align-items: center; gap: 6px;
            transition: color 0.2s;
        }
        .footer-nav a:hover { color: #90CAF9; }
        .footer-nav a i { font-size: 0.55rem; }

        .f-contact { display: flex; gap: 9px; align-items: flex-start; margin-bottom: 10px; }
        .f-contact i { color: #90CAF9; font-size: 0.8rem; margin-top: 3px; min-width: 14px; }
        .f-contact span { color: rgba(255,255,255,0.6); font-size: 0.8rem; line-height: 1.5; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 10px;
        }
        .footer-bottom span { color: rgba(255,255,255,0.4); font-size: 0.76rem; }
        .footer-bottom a { color: rgba(255,255,255,0.4); font-size: 0.76rem; transition: color 0.2s; }
        .footer-bottom a:hover { color: rgba(255,255,255,0.7); }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 28px; }
        }
        @media (max-width: 768px) {
            .nav-links, .nav-cta { display: none !important; }
            .nav-hamburger { display: flex; }
            .topbar-right { display: none; }
            .footer-grid { grid-template-columns: 1fr; gap: 24px; }
            .sec { padding: 48px 0; }
            .topbar-left { gap: 12px; }
        }
    </style>

    @yield('styles')
</head>
<body>

{{-- TOP BAR --}}
<div class="topbar">
    <div class="topbar-inner">
        <div class="topbar-left">
            <span class="topbar-item"><i class="fa-solid fa-phone"></i> {{ \App\Models\SiteSetting::get('phone', '+90 212 444 62 83') }}</span>
            <span class="topbar-item"><i class="fa-solid fa-envelope"></i> {{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}</span>
            <span class="topbar-item"><i class="fa-solid fa-tower-broadcast"></i> VHF Ch 16 · 12 · 11</span>
        </div>
        <div class="topbar-right">
            <div class="topbar-live"><span class="dot-live"></span> {{ __t('7/24 Nöbetçi Aktif', '24/7 Duty Active') }}</div>
            
            <div class="lang-switcher">
                <a href="{{ route('lang.switch', 'tr') }}" class="lang-btn {{ app()->getLocale() === 'tr' ? 'active' : '' }}">TR</a>
                <span class="lang-sep">|</span>
                <a href="{{ route('lang.switch', 'en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
            </div>
        </div>
    </div>
</div>

{{-- NAVBAR --}}
<nav class="nav">
    <div class="nav-inner">
        <a href="{{ route('home') }}" class="nav-logo">
            <div class="nav-logo-icon"><i class="fa-solid fa-anchor"></i></div>
            <div class="nav-logo-text">NAVEX<span>MAR</span></div>
        </a>

        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __t('Ana Sayfa', 'Home') }}</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __t('Hakkımızda', 'About Us') }}</a></li>
            <li><a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'active' : '' }}">{{ __t('Hizmetler', 'Services') }}</a></li>
            <li><a href="{{ route('straits-ports') }}" class="{{ request()->routeIs('straits-ports') ? 'active' : '' }}">{{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</a></li>
            <li><a href="{{ route('vessels.index') }}" class="{{ request()->routeIs('vessels.*') ? 'active' : '' }}">{{ __t('Filomuz', 'Fleet') }}</a></li>
            <li><a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'active' : '' }}">{{ __t('Haberler', 'News') }}</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __t('İletişim', 'Contact') }}</a></li>
        </ul>

        <div style="display:flex;align-items:center;gap:10px;">
            <a href="{{ route('contact') }}" class="nav-cta"><i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }}</a>
            <button class="nav-hamburger" id="navHam" aria-label="Menü">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

{{-- MOBILE DRAWER --}}
<div class="mob-overlay" id="mobOverlay"></div>
<div class="mob-drawer" id="mobDrawer">
    <button class="mob-close" id="mobClose">&times;</button>
    <div class="nav-logo" style="margin-bottom:16px;">
        <div class="nav-logo-icon"><i class="fa-solid fa-anchor"></i></div>
        <div class="nav-logo-text">NAVEX<span>MAR</span></div>
    </div>
    
    <div class="lang-switcher" style="margin-bottom:16px; align-self:flex-start;">
        <a href="{{ route('lang.switch', 'tr') }}" class="lang-btn {{ app()->getLocale() === 'tr' ? 'active' : '' }}">Türkçe (TR)</a>
        <span class="lang-sep">|</span>
        <a href="{{ route('lang.switch', 'en') }}" class="lang-btn {{ app()->getLocale() === 'en' ? 'active' : '' }}">English (EN)</a>
    </div>

    <ul class="mob-links">
        <li><a href="{{ route('home') }}"><i class="fa-solid fa-house fa-fw"></i> {{ __t('Ana Sayfa', 'Home') }}</a></li>
        <li><a href="{{ route('about') }}"><i class="fa-solid fa-building fa-fw"></i> {{ __t('Hakkımızda', 'About Us') }}</a></li>
        <li><a href="{{ route('services.index') }}"><i class="fa-solid fa-anchor fa-fw"></i> {{ __t('Hizmetler', 'Services') }}</a></li>
        <li><a href="{{ route('straits-ports') }}"><i class="fa-solid fa-compass fa-fw"></i> {{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</a></li>
        <li><a href="{{ route('vessels.index') }}"><i class="fa-solid fa-ship fa-fw"></i> {{ __t('Filomuz', 'Fleet') }}</a></li>
        <li><a href="{{ route('news.index') }}"><i class="fa-solid fa-newspaper fa-fw"></i> {{ __t('Haberler', 'News') }}</a></li>
        <li><a href="{{ route('contact') }}"><i class="fa-solid fa-phone fa-fw"></i> {{ __t('İletişim', 'Contact') }}</a></li>
    </ul>
    <a href="{{ route('contact') }}" class="btn-primary" style="width:100%;justify-content:center;margin-top:24px;">
        <i class="fa-solid fa-file-invoice-dollar"></i> {{ __t('Teklif Al', 'Get Quote') }}
    </a>
</div>

<main>
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="footer">
    <div class="container">
        <div class="footer-grid">

            <div>
                <div class="footer-logo">
                    <div class="footer-logo-icon"><i class="fa-solid fa-anchor"></i></div>
                    <div class="footer-logo-text">NAVEX<span>MAR</span></div>
                </div>
                <p class="footer-about-p">{{ __t(\App\Models\SiteSetting::get('about_short', 'Türk Boğazları ve Türkiye limanlarında 18 yıllık tecrübemizle armatör ve kiracılara 7/24 profesyonel gemi acenteliği hizmetleri sunuyoruz.'), 'Providing 24/7 professional shipping agency services for shipowners and charterers in the Turkish Straits and all ports of Turkey with 18 years of experience.') }}</p>
                <div class="footer-certs">
                    <span class="footer-cert">BIMCO {{ __t('Üyesi', 'Member') }}</span>
                    <span class="footer-cert">FONASBA</span>
                    <span class="footer-cert">ISO 9001:2015</span>
                    <span class="footer-cert">DTO {{ __t('Üyesi', 'Member') }}</span>
                </div>
            </div>

            <div class="footer-col">
                <h5>{{ __t('Hızlı Bağlantılar', 'Quick Links') }}</h5>
                <ul class="footer-nav">
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Ana Sayfa', 'Home') }}</a></li>
                    <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Hakkımızda', 'About Us') }}</a></li>
                    <li><a href="{{ route('services.index') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Hizmetlerimiz', 'Services') }}</a></li>
                    <li><a href="{{ route('straits-ports') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Boğazlar & Limanlar', 'Straits & Ports') }}</a></li>
                    <li><a href="{{ route('vessels.index') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Filomuz', 'Fleet') }}</a></li>
                    <li><a href="{{ route('news.index') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Haberler', 'News') }}</a></li>
                    <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('İletişim', 'Contact') }}</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>{{ __t('Hizmetlerimiz', 'Our Services') }}</h5>
                <ul class="footer-nav">
                    <li><a href="{{ route('services.show', 'turk-bogazlari-gecis-acenteligi') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Boğaz Transit Geçişi', 'Straits Transit Agency') }}</a></li>
                    <li><a href="{{ route('services.show', 'gemi-acenteligi-liman-hizmetleri') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Liman Acenteliği', 'Port Agency Services') }}</a></li>
                    <li><a href="{{ route('services.show', 'yakit-ve-kumanya-ikmali') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Bunkering & Kumanya', 'Bunkering & Provisions') }}</a></li>
                    <li><a href="{{ route('services.show', 'murettebat-degisimi-kara-lojistigi') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Mürettebat Değişimi', 'Crew Change Logistics') }}</a></li>
                    <li><a href="{{ route('services.show', 'yuk-ve-konteyner-operasyonlari') }}"><i class="fa-solid fa-chevron-right"></i> {{ __t('Yük Operasyonları', 'Cargo Operations') }}</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>{{ __t('İletişim', 'Contact Us') }}</h5>
                <div class="f-contact"><i class="fa-solid fa-location-dot"></i><span>{{ \App\Models\SiteSetting::get('address', 'Marport Plaza K:8, Ambarlı Liman Yolu, Avcılar — İstanbul') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-phone"></i><span>{{ \App\Models\SiteSetting::get('phone', '+90 212 444 62 83') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-mobile-screen"></i><span>{{ __t('Acil', 'Emergency') }}: {{ \App\Models\SiteSetting::get('mobile', '+90 532 700 90 90') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-envelope"></i><span>{{ \App\Models\SiteSetting::get('email', 'ops@navexmar.com') }}</span></div>
                <div class="f-contact"><i class="fa-solid fa-tower-broadcast"></i><span>VHF Ch 16 / 12 / 11</span></div>
            </div>

        </div>

        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} NAVEXMAR {{ __t('Denizcilik ve Liman Hizmetleri A.Ş. Tüm hakları saklıdır.', 'Maritime & Port Services Inc. All rights reserved.') }}</span>
            <a href="{{ route('admin.login') }}"><i class="fa-solid fa-lock"></i> {{ __t('Yönetim Paneli', 'Admin Panel') }}</a>
        </div>
    </div>
</footer>

<script>
    const ham = document.getElementById('navHam');
    const drawer = document.getElementById('mobDrawer');
    const overlay = document.getElementById('mobOverlay');
    const mobClose = document.getElementById('mobClose');
    function openMenu() { drawer.classList.add('open'); overlay.classList.add('open'); document.body.style.overflow='hidden'; }
    function closeMenu() { drawer.classList.remove('open'); overlay.classList.remove('open'); document.body.style.overflow=''; }
    ham?.addEventListener('click', openMenu);
    mobClose?.addEventListener('click', closeMenu);
    overlay?.addEventListener('click', closeMenu);
</script>

@yield('scripts')
</body>
</html>
