<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - BASIRU Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 270px;
            --primary: #1abc9c;
            --primary-dark: #16a085;
            --primary-light: #48c9b0;
            --secondary: #2c3e50;
            --secondary-dark: #1a252f;
            --accent: #3498db;
            --danger: #e74c3c;
            --warning: #f39c12;
            --success: #27ae60;
            --bg: #f4f6f9;
            --card-bg: #fff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 15px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.1);
            --radius: 14px;
            --radius-sm: 8px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: #334155;
            margin: 0;
        }

        /* ========================
           SCROLLBAR
        ======================== */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.15);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.25);
        }

        /* ========================
           SIDEBAR
        ======================== */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: #fff;
            z-index: 1050;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 1.4rem 1.5rem;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            background: rgba(26, 188, 156, 0.08);
        }

        .sidebar-brand .brand-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            box-shadow: 0 4px 12px rgba(26, 188, 156, 0.3);
        }

        .sidebar-section-label {
            padding: 1.2rem 1.5rem 0.4rem;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.3);
        }

        .sidebar-nav {
            padding: 0.5rem 0;
            flex: 1;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.65rem 1.5rem;
            color: rgba(255, 255, 255, 0.55);
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
            font-size: 0.85rem;
            font-weight: 500;
            margin: 1px 0;
            position: relative;
        }

        .sidebar-link:hover {
            color: rgba(255, 255, 255, 0.95);
            background: rgba(26, 188, 156, 0.08);
            border-left-color: rgba(26, 188, 156, 0.4);
        }

        .sidebar-link.active {
            color: #fff;
            background: rgba(26, 188, 156, 0.15);
            border-left-color: var(--primary);
            font-weight: 600;
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: var(--primary);
            border-radius: 3px 0 0 3px;
        }

        .sidebar-link i {
            width: 20px;
            text-align: center;
            font-size: 0.9rem;
            opacity: 0.7;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .sidebar-link:hover i,
        .sidebar-link.active i {
            opacity: 1;
            color: var(--primary);
        }

        .sidebar-link .badge {
            font-size: 0.65rem;
            padding: 3px 8px;
        }

        /* Sidebar Accordion Groups */
        .sidebar-group {
            margin: 2px 0;
        }

        .sidebar-group-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 0.65rem 1.5rem;
            color: rgba(255, 255, 255, 0.55);
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border-left: 3px solid transparent;
            user-select: none;
        }

        .sidebar-group-toggle:hover {
            color: rgba(255, 255, 255, 0.95);
            background: rgba(26, 188, 156, 0.08);
        }

        .sidebar-group-toggle .d-flex {
            gap: 12px;
        }

        .sidebar-group-toggle i:first-child,
        .sidebar-group-toggle .d-flex i {
            width: 20px;
            text-align: center;
            font-size: 0.9rem;
            opacity: 0.7;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .sidebar-group-toggle:hover i {
            opacity: 1;
        }

        .sidebar-arrow {
            font-size: 0.6rem;
            transition: transform 0.3s ease;
            opacity: 0.4;
        }

        .sidebar-group.open>.sidebar-group-toggle {
            color: rgba(255, 255, 255, 0.95);
            background: rgba(26, 188, 156, 0.1);
            border-left-color: rgba(26, 188, 156, 0.3);
        }

        .sidebar-group.open>.sidebar-group-toggle .sidebar-arrow {
            transform: rotate(90deg);
            opacity: 0.8;
        }

        .sidebar-group.open>.sidebar-group-toggle .d-flex i {
            color: var(--primary);
            opacity: 1;
        }

        .sidebar-group-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(0, 0, 0, 0.12);
        }

        .sidebar-group.open>.sidebar-group-menu {
            max-height: 300px;
        }

        .sidebar-group-menu .sidebar-link {
            padding-left: 3rem;
            font-size: 0.82rem;
            border-left: none;
            gap: 8px;
        }

        .sidebar-group-menu .sidebar-link::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            flex-shrink: 0;
            transition: var(--transition);
        }

        .sidebar-group-menu .sidebar-link:hover::before,
        .sidebar-group-menu .sidebar-link.active::before {
            background: var(--primary);
        }

        .sidebar-group-menu .sidebar-link.active {
            background: rgba(26, 188, 156, 0.18);
        }

        .sidebar-divider {
            margin: 0.5rem 1.2rem;
            border-color: rgba(255, 255, 255, 0.06);
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            background: rgba(0, 0, 0, 0.15);
        }

        /* ========================
           MAIN CONTENT
        ======================== */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ========================
           TOP BAR
        ======================== */
        .top-bar {
            background: var(--card-bg);
            padding: 0.85rem 2rem;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 1rem;
            position: sticky;
            top: 0;
            z-index: 1040;
            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        }

        .top-bar .page-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--secondary);
            margin: 0;
        }

        .top-bar .page-title i {
            color: var(--primary);
            margin-right: 8px;
        }

        .top-bar .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-bar .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.8rem;
        }

        .top-bar .user-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--secondary);
        }

        .top-bar .user-role {
            font-size: 0.7rem;
            color: #94a3b8;
        }

        /* ========================
           CONTENT AREA
        ======================== */
        .content-area {
            padding: 1.5rem 2rem 2rem;
            flex: 1;
        }

        /* ========================
           CARDS
        ======================== */
        .admin-card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            background: var(--card-bg);
            transition: var(--transition);
            overflow: hidden;
        }

        .admin-card:hover {
            box-shadow: var(--shadow-md);
        }

        .admin-card .card-header {
            background: var(--card-bg);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 1.5rem;
        }

        .admin-card .card-header h6 {
            font-weight: 700;
            font-size: 0.9rem;
        }

        .admin-card .card-body {
            padding: 1.5rem;
        }

        /* Stat Cards */
        .stat-card {
            border: none;
            border-radius: var(--radius);
            padding: 1.4rem 1.5rem;
            color: #fff;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-card h3 {
            font-size: 1.8rem;
            font-weight: 800;
        }

        .stat-card p {
            font-weight: 500;
        }

        /* ========================
           TABLES
        ======================== */
        .table {
            font-size: 0.88rem;
        }

        .table thead th {
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            border-bottom: 2px solid #e2e8f0;
            padding: 0.9rem 1rem;
            background: #f8fafc;
        }

        .table tbody td {
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        .table-hover tbody tr:hover {
            background: rgba(26, 188, 156, 0.04);
        }

        /* ========================
           FORMS
        ======================== */
        .form-control,
        .form-select {
            border-radius: var(--radius-sm);
            border: 1.5px solid #e2e8f0;
            padding: 0.6rem 0.9rem;
            font-size: 0.88rem;
            transition: var(--transition);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.12);
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.4rem;
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-control-lg {
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }

        /* ========================
           BUTTONS
        ======================== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), #0e8c73);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(26, 188, 156, 0.3);
        }

        .btn-outline-secondary {
            font-weight: 500;
            font-size: 0.85rem;
            border-radius: 50px;
        }

        .btn-sm {
            font-size: 0.78rem;
            padding: 0.35rem 0.7rem;
            border-radius: var(--radius-sm);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: #fff;
        }

        .btn-warning:hover {
            color: #fff;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
        }

        /* ========================
           BADGES
        ======================== */
        .badge {
            font-weight: 600;
            font-size: 0.72rem;
            letter-spacing: 0.3px;
        }

        /* ========================
           ADMIN PAGINATION
        ======================== */
        .admin-pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination-info {
            font-size: 0.82rem;
            color: #64748b;
        }

        .pagination-info strong {
            color: #1e293b;
            font-weight: 700;
        }

        .admin-pagination {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-pagination .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            color: #475569;
            background: #fff;
            border: 1px solid #e2e8f0;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .admin-pagination .page-item .page-link:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
        }

        .admin-pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-color: transparent;
            color: #fff;
            font-weight: 700;
            box-shadow: 0 3px 8px rgba(26, 188, 156, 0.35);
        }

        .admin-pagination .page-item.disabled .page-link {
            color: #cbd5e1;
            background: #f8fafc;
            border-color: #f1f5f9;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        .admin-pagination .page-item .page-link.dots {
            border: none;
            background: transparent;
            cursor: default;
            min-width: 24px;
            color: #94a3b8;
            font-size: 1rem;
            letter-spacing: 2px;
        }

        .admin-pagination .page-item .page-link.dots:hover {
            transform: none;
            box-shadow: none;
        }

        /* ========================
           ALERTS
        ======================== */
        .alert {
            border: none;
            border-radius: var(--radius-sm);
            font-size: 0.88rem;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: #065f46;
            border-left: 4px solid var(--success);
        }

        .alert-danger {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #991b1b;
            border-left: 4px solid var(--danger);
        }

        /* ========================
           PAGINATION
        ======================== */
        .pagination {
            gap: 4px;
        }

        .page-link {
            border-radius: var(--radius-sm) !important;
            border: none;
            color: var(--secondary);
            font-size: 0.82rem;
            font-weight: 500;
            padding: 0.45rem 0.8rem;
        }

        .page-link:hover {
            background: rgba(26, 188, 156, 0.1);
            color: var(--primary-dark);
        }

        .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* ========================
           RESPONSIVE
        ======================== */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .content-area {
                padding: 1rem;
            }

            .top-bar {
                padding: 0.85rem 1rem;
            }
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1040;
            backdrop-filter: blur(2px);
        }

        .sidebar.show~.sidebar-overlay {
            display: block;
        }

        /* Page-specific styles */
        @yield('styles')
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <span>BASIRU</span>
        </div>

        <nav class="sidebar-nav">
            <!-- Dashboard (standalone) -->
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <!-- Program Group -->
            <div class="sidebar-group {{ request()->routeIs('admin.galleries.*', 'admin.videos.*', 'admin.best-practices.*') ? 'open' : '' }}">
                <div class="sidebar-group-toggle" onclick="toggleSidebarGroup(this)">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-layer-group"></i> Program
                    </div>
                    <i class="fas fa-chevron-right sidebar-arrow"></i>
                </div>
                <div class="sidebar-group-menu">
                    <a href="{{ route('admin.galleries.index') }}" class="sidebar-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <i class="fas fa-images"></i> Galeri
                    </a>
                    <a href="{{ route('admin.videos.index') }}" class="sidebar-link {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
                        <i class="fas fa-play-circle"></i> Video
                    </a>
                    <a href="{{ route('admin.best-practices.index') }}" class="sidebar-link {{ request()->routeIs('admin.best-practices.*') ? 'active' : '' }}">
                        <i class="fas fa-lightbulb"></i> Praktik Baik
                    </a>
                </div>
            </div>

            <!-- Konten Group -->
            <div class="sidebar-group {{ request()->routeIs('admin.digital-books.*', 'admin.library.*') ? 'open' : '' }}">
                <div class="sidebar-group-toggle" onclick="toggleSidebarGroup(this)">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-folder-open"></i> Konten
                    </div>
                    <i class="fas fa-chevron-right sidebar-arrow"></i>
                </div>
                <div class="sidebar-group-menu">
                    <a href="{{ route('admin.digital-books.index') }}" class="sidebar-link {{ request()->routeIs('admin.digital-books.*') ? 'active' : '' }}">
                        <i class="fas fa-book-open"></i> Buku Digital
                    </a>
                    <a href="{{ route('admin.library.index') }}" class="sidebar-link {{ request()->routeIs('admin.library.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i> Perpustakaan
                    </a>
                </div>
            </div>

            <!-- Interaksi Group -->
            <div class="sidebar-group {{ request()->routeIs('admin.quizzes.*', 'admin.contacts.*') ? 'open' : '' }}">
                <div class="sidebar-group-toggle" onclick="toggleSidebarGroup(this)">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-comments"></i> Interaksi
                    </div>
                    <i class="fas fa-chevron-right sidebar-arrow"></i>
                </div>
                <div class="sidebar-group-menu">
                    <a href="{{ route('admin.quizzes.index') }}" class="sidebar-link {{ request()->routeIs('admin.quizzes.*') ? 'active' : '' }}">
                        <i class="fas fa-puzzle-piece"></i> Quiz
                    </a>
                    <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Pesan
                        @php $unread = \App\Models\Contact::where('is_read', false)->count(); @endphp
                        @if($unread > 0)
                        <span class="badge bg-danger ms-auto rounded-pill">{{ $unread }}</span>
                        @endif
                    </a>
                </div>
            </div>

            <hr class="sidebar-divider">

            <!-- Profil Saya -->
            <a href="{{ route('admin.profile.edit') }}" class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i> Profil Saya
            </a>

            <!-- Pengaturan (standalone) -->
            <a href="{{ route('admin.site-settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.site-settings.*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Pengaturan Situs
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" class="sidebar-link" target="_blank" style="padding-left:0;">
                <i class="fas fa-external-link-alt"></i> Lihat Website
            </a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="sidebar-link w-100 border-0 bg-transparent text-start" style="padding-left:0;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Mobile overlay -->
    <div class="sidebar-overlay" onclick="document.getElementById('sidebar').classList.remove('show'); this.style.display='none';"></div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <button class="btn btn-sm d-lg-none me-2" onclick="document.getElementById('sidebar').classList.toggle('show'); document.querySelector('.sidebar-overlay').style.display = document.getElementById('sidebar').classList.contains('show') ? 'block' : 'none';">
                <i class="fas fa-bars"></i>
            </button>
            <h5 class="page-title mb-0">
                <i class="fas fa-circle fa-xs"></i>
                @yield('page-title', 'Dashboard')
            </h5>
            <a href="{{ route('admin.profile.edit') }}" class="ms-auto user-info text-decoration-none">
                <div class="text-end d-none d-md-block">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">Administrator</div>
                </div>
                @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Avatar" class="user-avatar" style="object-fit:cover;">
                @else
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                @endif
            </a>
        </div>

        <div class="content-area">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebarGroup(toggle) {
            const group = toggle.closest('.sidebar-group');
            const isOpen = group.classList.contains('open');

            // Close all other groups (accordion behavior)
            document.querySelectorAll('.sidebar-group.open').forEach(function(g) {
                if (g !== group) {
                    g.classList.remove('open');
                }
            });

            // Toggle current group
            group.classList.toggle('open', !isOpen);
        }
    </script>

    @yield('scripts')
</body>

</html>