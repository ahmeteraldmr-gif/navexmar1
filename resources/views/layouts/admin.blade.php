<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NAVEXMAR Admin Panel')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --admin-bg: #070D18;
            --admin-sidebar: #0B1628;
            --admin-card: #0F1F38;
            --admin-accent: #00ADB5;
            --admin-hover: #162C4E;
            --admin-text: #F1F5F9;
            --admin-muted: #94A3B8;
            --admin-border: rgba(255, 255, 255, 0.08);
            --admin-success: #10B981;
            --admin-warning: #F59E0B;
            --admin-danger: #EF4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--admin-sidebar);
            border-right: 1px solid var(--admin-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 24px 20px;
            font-size: 1.3rem;
            font-weight: 800;
            color: #FFF;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid var(--admin-border);
        }

        .sidebar-brand i {
            color: var(--admin-accent);
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 12px;
            flex: 1;
        }

        .sidebar-item {
            margin-bottom: 6px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--admin-muted);
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: var(--admin-hover);
            color: #FFF;
        }

        .sidebar-link.active i {
            color: var(--admin-accent);
        }

        .badge-count {
            margin-left: auto;
            background: var(--admin-accent);
            color: #050B14;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: 12px;
        }

        /* Main Area */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .topbar {
            height: 70px;
            background-color: var(--admin-sidebar);
            border-bottom: 1px solid var(--admin-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--admin-accent), #38BDF8);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #050B14;
        }

        .logout-btn {
            background: rgba(239, 68, 68, 0.15);
            color: var(--admin-danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .logout-btn:hover {
            background: var(--admin-danger);
            color: #FFF;
        }

        /* Content Body */
        .content-body {
            padding: 30px;
            flex: 1;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid var(--admin-success);
            color: #34D399;
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Generic Table Styling */
        .admin-table-container {
            background-color: var(--admin-card);
            border: 1px solid var(--admin-border);
            border-radius: 12px;
            overflow: hidden;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }

        .admin-table th {
            background-color: rgba(255, 255, 255, 0.03);
            padding: 16px 20px;
            color: var(--admin-muted);
            font-weight: 700;
            border-bottom: 1px solid var(--admin-border);
        }

        .admin-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--admin-border);
            color: var(--admin-text);
        }

        .admin-table tr:last-child td {
            border-bottom: none;
        }

        .admin-table tr:hover td {
            background-color: rgba(255, 255, 255, 0.02);
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            border: none;
            cursor: pointer;
        }

        .btn-edit { background: rgba(56, 189, 248, 0.15); color: #38BDF8; }
        .btn-delete { background: rgba(239, 68, 68, 0.15); color: #EF4444; }
        .btn-view { background: rgba(0, 173, 181, 0.15); color: #00ADB5; }

        /* Form Styling */
        .admin-form-group {
            margin-bottom: 20px;
        }

        .admin-form-label {
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 8px;
            color: var(--admin-text);
        }

        .admin-form-control {
            width: 100%;
            padding: 12px 16px;
            background: #0B1628;
            border: 1px solid var(--admin-border);
            border-radius: 8px;
            color: #FFF;
            font-family: inherit;
            font-size: 0.95rem;
        }

        .admin-form-control:focus {
            outline: none;
            border-color: var(--admin-accent);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--admin-accent), #008891);
            color: #FFF;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-anchor"></i> NAVEXMAR YÖNETİM
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.quotes.index') }}" class="sidebar-link {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-calculator"></i> Teklif Talepleri
                    @php $newQuotes = \App\Models\QuoteRequest::where('status', 'Yeni')->count(); @endphp
                    @if($newQuotes > 0)
                        <span class="badge-count">{{ $newQuotes }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope"></i> Mesajlar
                    @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                    @if($unread > 0)
                        <span class="badge-count">{{ $unread }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-ship"></i> Hizmet Yönetimi
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.vessels.index') }}" class="sidebar-link {{ request()->routeIs('admin.vessels.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-water-ladder"></i> Gemi / Filo
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.news.index') }}" class="sidebar-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i> Haber & Duyurular
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gears"></i> Site Ayarları
                </a>
            </li>
            <li class="sidebar-item" style="margin-top: 20px;">
                <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Siteyi Görüntüle
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <header class="topbar">
            <div>
                <h3 style="font-weight: 700; font-size: 1.1rem;">@yield('header_title', 'Yönetim Paneli')</h3>
            </div>
            <div class="user-menu">
                <div style="text-align: right;">
                    <div style="font-weight: 700; font-size: 0.9rem;">{{ Auth::user()->name ?? 'Yönetici' }}</div>
                    <div style="font-size: 0.75rem; color: var(--admin-muted);">{{ Auth::user()->email ?? '' }}</div>
                </div>
                <div class="user-avatar">N</div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i> Çıkış
                    </button>
                </form>
            </div>
        </header>

        <div class="content-body">
            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
