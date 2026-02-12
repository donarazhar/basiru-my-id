<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="{{ \App\Models\SiteSetting::getValue('site_description', 'BASIRU - Pengembangan Kompetensi Guru PAUD') }}" />
    <meta name="author" content="BASIRU.MY.ID" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', \App\Models\SiteSetting::getValue('site_title', 'BASIRU - Pengembangan Kompetensi Guru'))</title>

    <!-- Favicon -->
    @if(\App\Models\SiteSetting::getValue('site_favicon'))
    <link rel="icon" href="{{ asset('storage/' . \App\Models\SiteSetting::getValue('site_favicon')) }}" />
    @else
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logobasiru.ico') }}" />
    @endif
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1abc9c;
            --primary-dark: #16a085;
            --primary-light: #48c9b0;
            --primary-glow: rgba(26, 188, 156, 0.4);
            --secondary: #2c3e50;
            --secondary-dark: #1a252f;
            --secondary-light: #34495e;
            --accent: #e74c3c;
            --accent-warm: #f39c12;
            --gradient-primary: linear-gradient(135deg, #1abc9c 0%, #16a085 50%, #0e8c73 100%);
            --gradient-dark: linear-gradient(135deg, #2c3e50 0%, #1a252f 100%);
            --gradient-hero: linear-gradient(135deg, rgba(26, 188, 156, 0.92), rgba(22, 160, 133, 0.88), rgba(44, 62, 80, 0.85));
            --shadow-soft: 0 4px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 8px 30px rgba(0, 0, 0, 0.12);
            --shadow-strong: 0 15px 50px rgba(0, 0, 0, 0.2);
            --shadow-glow: 0 0 30px rgba(26, 188, 156, 0.25);
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
            font-family: 'Lato', sans-serif;
            color: #333;
            overflow-x: hidden;
            background: #f8f9fa;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Montserrat', sans-serif;
        }

        /* ============================
           NAVBAR - Glassmorphism
        ============================ */
        .navbar {
            padding: 1rem 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--secondary) !important;
            z-index: 1050;
        }

        .navbar.scrolled {
            padding: 0.6rem 0;
            background: var(--secondary-dark) !important;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.35);
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.5rem;
            font-weight: 800;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 3px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.03);
        }

        .navbar-brand img {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
            transition: all 0.3s ease;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1.5px;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 60%;
            height: 2px;
            background: var(--primary);
            border-radius: 2px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            transform: translateX(-50%) scaleX(1);
        }

        .nav-link:hover {
            color: #fff !important;
            background: rgba(26, 188, 156, 0.2) !important;
        }

        .nav-link.active {
            background: var(--primary) !important;
            color: #fff !important;
            box-shadow: 0 4px 15px rgba(26, 188, 156, 0.4);
        }

        .nav-link.active::after {
            display: none;
        }

        .dropdown-menu {
            background: rgba(44, 62, 80, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            min-width: 220px;
            padding: 0.5rem;
            animation: dropdownFade 0.3s ease;
        }

        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.75rem 1.25rem;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 2px 0;
            font-size: 0.9rem;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background: var(--primary);
            color: #fff;
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(26, 188, 156, 0.3);
        }

        .dropdown-item i {
            margin-right: 10px;
            width: 18px;
            text-align: center;
        }

        .navbar-toggler {
            border: 2px solid rgba(255, 255, 255, 0.3) !important;
            padding: 0.5rem 0.75rem;
        }

        /* ============================
           PAGE SECTIONS
        ============================ */
        .page-section {
            padding: 6rem 0;
            position: relative;
        }

        .page-section-heading {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: 2px;
        }

        /* ============================
           DIVIDER
        ============================ */
        .divider-custom {
            margin: 1.25rem 0 2rem;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .divider-custom .divider-custom-line {
            width: 100%;
            max-width: 7rem;
            height: 3px;
            background: var(--secondary);
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }

        .divider-custom .divider-custom-line::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .divider-custom .divider-custom-line:first-child {
            margin-right: 1rem;
        }

        .divider-custom .divider-custom-line:last-child {
            margin-left: 1rem;
        }

        .divider-custom .divider-custom-icon {
            color: var(--secondary);
            font-size: 1.8rem;
            animation: pulse-icon 2s infinite;
        }

        @keyframes pulse-icon {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15);
            }
        }

        .divider-custom.divider-light .divider-custom-line {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .divider-custom.divider-light .divider-custom-icon {
            color: #fff;
        }

        /* ============================
           BUTTONS
        ============================ */
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #16a085, #0e8c73);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(26, 188, 156, 0.4);
        }

        .btn-xl {
            padding: 1rem 2rem;
            font-size: 1.15rem;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .btn-xl::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-xl:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-outline-light {
            border-width: 2px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
        }

        /* ============================
           CARDS
        ============================ */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-soft);
            background: #fff;
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: var(--shadow-strong), var(--shadow-glow);
        }

        /* ============================
           MODERN FORM - Glassmorphism
        ============================ */
        .modern-form {
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
        }

        .modern-input {
            background: rgba(255, 255, 255, 0.95) !important;
            border: 2px solid rgba(233, 236, 239, 0.8);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
        }

        .modern-input:focus {
            background: #fff !important;
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 4px rgba(26, 188, 156, 0.15), 0 4px 20px rgba(0, 0, 0, 0.08) !important;
            transform: translateY(-2px);
        }

        .modern-button {
            border-radius: 50px;
            padding: 1rem 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            box-shadow: 0 6px 20px rgba(26, 188, 156, 0.4);
            position: relative;
            overflow: hidden;
        }

        .modern-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 35px rgba(26, 188, 156, 0.5);
        }

        .btn-primary.modern-button {
            background: var(--gradient-primary);
        }

        /* ============================
           FOOTER
        ============================ */
        .footer {
            padding-top: 5rem;
            padding-bottom: 5rem;
            background: var(--gradient-dark);
            color: #fff;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .footer h4 {
            letter-spacing: 2px;
            position: relative;
            padding-bottom: 15px;
        }

        .footer h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
        }

        .copyright {
            background: var(--secondary-dark);
        }

        .btn-social {
            width: 3.25rem;
            height: 3.25rem;
            font-size: 1.25rem;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .btn-social::before {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 50%;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-social:hover {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            transform: translateY(-5px) rotate(5deg);
            box-shadow: 0 8px 25px rgba(26, 188, 156, 0.5);
        }

        /* ============================
           WAVE SEPARATOR
        ============================ */
        .wave-separator {
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave-separator svg {
            width: calc(100% + 2px);
            height: 80px;
            display: block;
        }

        .wave-separator-top {
            position: absolute;
            top: -2px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .wave-separator-top svg {
            width: calc(100% + 2px);
            height: 80px;
            display: block;
        }

        /* ============================
           BACKGROUND UTILITY
        ============================ */
        .bg-primary {
            background-color: var(--primary) !important;
        }

        .bg-secondary {
            background-color: var(--secondary) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .text-secondary {
            color: var(--secondary) !important;
        }

        /* ============================
           RESPONSIVE
        ============================ */
        @media (max-width: 991.98px) {
            .navbar-nav .dropdown-menu {
                background: rgba(44, 62, 80, 0.98) !important;
                box-shadow: none !important;
                border: 1px solid rgba(255, 255, 255, 0.1) !important;
                padding: 0.5rem !important;
                margin-top: 0.5rem !important;
                border-radius: 12px !important;
                position: relative !important;
                width: 100% !important;
            }

            .navbar {
                z-index: 1050;
            }

            .navbar.scrolled,
            .navbar {
                background: var(--secondary-dark) !important;
            }

            /* Mobile toggler */
            .navbar-toggler {
                border: 2px solid rgba(255, 255, 255, 0.3) !important;
                padding: 0.4rem 0.6rem !important;
                font-size: 1.1rem !important;
                border-radius: 8px !important;
                color: #fff !important;
                background: rgba(26, 188, 156, 0.3) !important;
                transition: all 0.3s ease;
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 3px rgba(26, 188, 156, 0.4) !important;
            }

            .navbar-toggler:hover {
                background: rgba(26, 188, 156, 0.5) !important;
            }

            /* Mobile brand */
            .navbar-brand {
                font-size: 1.1rem !important;
                letter-spacing: 1px;
                max-width: 70%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .navbar-brand img {
                height: 28px !important;
            }

            /* Mobile collapse */
            .navbar-collapse {
                background: var(--secondary-dark);
                border-radius: 0 0 16px 16px;
                padding: 1rem;
                margin: 0.5rem -12px 0;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar-nav .nav-link {
                padding: 0.75rem 1rem !important;
                border-radius: 8px;
                margin-bottom: 2px;
            }

            .navbar-nav .nav-link:hover,
            .navbar-nav .nav-link.active {
                background: rgba(26, 188, 156, 0.15);
            }

            .page-section-heading {
                font-size: 1.8rem;
            }

            .page-section {
                padding: 4rem 0;
            }

            .wave-separator svg,
            .wave-separator-top svg {
                height: 40px;
            }
        }

        @media (max-width: 575.98px) {
            .page-section-heading {
                font-size: 1.5rem;
                letter-spacing: 1px;
            }

            .page-section {
                padding: 3rem 0;
            }

            .modern-form {
                padding: 1.5rem;
            }

            .footer {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
        }

        /* ============================
           SCROLL ANIMATIONS (Fallback for no-JS)
        ============================ */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading animation */
        .section-badge {
            display: inline-block;
            background: rgba(26, 188, 156, 0.12);
            color: var(--primary);
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            border: 1px solid rgba(26, 188, 156, 0.2);
        }

        .section-badge-light {
            background: rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @yield('styles')
    </style>
</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if(\App\Models\SiteSetting::getValue('site_logo'))
                <img src="{{ asset('storage/' . \App\Models\SiteSetting::getValue('site_logo')) }}" alt="BASIRU" height="35" class="me-2" style="border-radius: 50%;">
                @else
                <img src="{{ asset('assets/img/logobasiru.png') }}" alt="BASIRU" height="35" class="me-2" onerror="this.style.display='none'">
                @endif
                {{ \App\Models\SiteSetting::getValue('hero_heading', 'BASIRU') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}#carousel-section">
                            <i class="fas fa-images"></i> Galeri
                        </a>
                    </li>
                    <li class="nav-item dropdown mx-0 mx-lg-1">
                        <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" href="#" id="programDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-graduation-cap"></i> Program
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="programDropdown">
                            <li><a class="dropdown-item" href="{{ route('best-practices.index') }}"><i class="fas fa-users"></i> Praktik Baik</a></li>
                            <li><a class="dropdown-item" href="{{ route('library.index') }}"><i class="fas fa-book"></i> Perpustakaan</a></li>
                            <li><a class="dropdown-item" href="{{ route('digital-books.index') }}"><i class="fas fa-tablet-alt"></i> Buku Digital</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('home') }}#about">
                            <i class="fas fa-play-circle"></i> Video
                        </a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('home') }}#refleksi">
                            <i class="fas fa-question-circle"></i> Quiz
                        </a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('home') }}#contact">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="0">
                    <h4 class="text-uppercase mb-4">{{ \App\Models\SiteSetting::getValue('footer_org', 'PG PAUD') }}</h4>
                    <p class="lead mb-0" style="opacity: 0.85;">
                        {!! nl2br(e(\App\Models\SiteSetting::getValue('footer_address', "UNIVERSITAS NEGERI JAKARTA\nRawamangun Jakarta Timur"))) !!}
                    </p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="150">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ \App\Models\SiteSetting::getValue('facebook_url', '#') }}" target="_blank" aria-label="Facebook"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ \App\Models\SiteSetting::getValue('twitter_url', '#') }}" target="_blank" aria-label="Twitter"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ \App\Models\SiteSetting::getValue('linkedin_url', '#') }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ \App\Models\SiteSetting::getValue('instagram_url', '#') }}" target="_blank" aria-label="Instagram"><i class="fab fa-fw fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{ \App\Models\SiteSetting::getValue('youtube_url', '#') }}" target="_blank" aria-label="YouTube"><i class="fab fa-fw fa-youtube"></i></a>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-uppercase mb-4">About {{ \App\Models\SiteSetting::getValue('hero_heading', 'BASIRU') }}</h4>
                    <p class="lead mb-0" style="opacity: 0.85;">{{ \App\Models\SiteSetting::getValue('footer_about', 'BASIRU, dibuat untuk para praktisi PAUD') }}</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; {{ \App\Models\SiteSetting::getValue('footer_copyright', 'Nila Fitria') }} {{ date('Y') }} &bull; All Rights Reserved</small></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80,
            disable: function() {
                return window.innerWidth < 768 && false;
            }
        });

        // Navbar scroll effect with glassmorphism
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNav');
            const currentScroll = window.scrollY;

            if (currentScroll > 60) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            lastScroll = currentScroll;
        });

        // Auto-close mobile menu
        document.addEventListener('DOMContentLoaded', function() {
            const navbarCollapse = document.getElementById('navbarResponsive');
            const navLinks = document.querySelectorAll('.nav-link:not(.dropdown-toggle)');
            const dropdownItems = document.querySelectorAll('.dropdown-item');

            [...navLinks, ...dropdownItems].forEach(function(link) {
                link.addEventListener('click', function() {
                    if (navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse).hide();
                    }
                });
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href*="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href.includes('#') && !href.startsWith('#')) return;
                    const target = document.querySelector(href.includes('#') ? href.split('#')[1] ? '#' + href.split('#')[1] : '' : href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });

        // Intersection Observer for fade-in-up (fallback)
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
    </script>

    @yield('scripts')
</body>

</html>