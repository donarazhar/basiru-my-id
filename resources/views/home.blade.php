@extends('layouts.app')

@section('title', 'BASIRU - Pengembangan Kompetensi Guru PAUD')

@section('styles')
/* ============================
HERO / MASTHEAD
============================ */
.masthead {
min-height: 100vh;
display: flex;
align-items: center;
justify-content: center;
padding-top: 120px;
padding-bottom: 60px;
overflow: hidden;
background: linear-gradient(135deg, #1abc9c 0%, #16a085 40%, #0e8c73 70%, #148f77 100%);
position: relative;
}

/* Floating particles */
.masthead::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background:
radial-gradient(2px 2px at 10% 20%, rgba(255, 255, 255, 0.4) 50%, transparent 100%),
radial-gradient(2px 2px at 30% 60%, rgba(255, 255, 255, 0.3) 50%, transparent 100%),
radial-gradient(3px 3px at 50% 30%, rgba(255, 255, 255, 0.25) 50%, transparent 100%),
radial-gradient(2px 2px at 70% 70%, rgba(255, 255, 255, 0.35) 50%, transparent 100%),
radial-gradient(2px 2px at 90% 40%, rgba(255, 255, 255, 0.3) 50%, transparent 100%),
radial-gradient(3px 3px at 20% 80%, rgba(255, 255, 255, 0.2) 50%, transparent 100%),
radial-gradient(2px 2px at 80% 10%, rgba(255, 255, 255, 0.3) 50%, transparent 100%);
animation: float-particles 25s linear infinite;
pointer-events: none;
}

@keyframes float-particles {
0% {
transform: translateY(0) translateX(0);
}

25% {
transform: translateY(-15px) translateX(10px);
}

50% {
transform: translateY(-25px) translateX(-5px);
}

75% {
transform: translateY(-10px) translateX(15px);
}

100% {
transform: translateY(0) translateX(0);
}
}

/* Floating geometric shapes */
.floating-shape {
position: absolute;
border-radius: 50%;
opacity: 0.08;
pointer-events: none;
}

.shape-1 {
width: 300px;
height: 300px;
background: #fff;
top: 10%;
left: -5%;
animation: float-shape 8s ease-in-out infinite;
}

.shape-2 {
width: 200px;
height: 200px;
background: #fff;
bottom: 15%;
right: -3%;
animation: float-shape 10s ease-in-out infinite reverse;
}

.shape-3 {
width: 150px;
height: 150px;
background: #fff;
top: 40%;
right: 10%;
animation: float-shape 12s ease-in-out infinite 2s;
}

@keyframes float-shape {

0%,
100% {
transform: translate(0, 0) rotate(0deg);
}

33% {
transform: translate(20px, -30px) rotate(5deg);
}

66% {
transform: translate(-15px, 15px) rotate(-3deg);
}
}

.masthead-avatar {
width: 13rem;
height: 13rem;
object-fit: cover;
border: 4px solid rgba(255, 255, 255, 0.3);
box-shadow: 0 0 50px rgba(255, 255, 255, 0.2), 0 0 100px rgba(26, 188, 156, 0.15);
animation: avatar-glow 3s ease-in-out infinite alternate;
transition: all 0.5s ease;
}

.masthead-avatar:hover {
transform: scale(1.05) rotate(3deg);
box-shadow: 0 0 60px rgba(255, 255, 255, 0.3), 0 0 120px rgba(26, 188, 156, 0.25);
}

@keyframes avatar-glow {
0% {
box-shadow: 0 0 30px rgba(255, 255, 255, 0.15), 0 0 60px rgba(26, 188, 156, 0.1);
}

100% {
box-shadow: 0 0 50px rgba(255, 255, 255, 0.25), 0 0 100px rgba(26, 188, 156, 0.2);
}
}

.masthead-heading {
font-size: 4.5rem;
font-weight: 900;
line-height: 1;
text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
letter-spacing: 8px;
}

.masthead-subheading {
font-size: 1.4rem;
font-weight: 600;
letter-spacing: 4px;
text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
}

.masthead-motto {
font-style: italic;
font-size: 1.1rem;
color: rgba(255, 255, 255, 0.95);
text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4);
background: rgba(255, 255, 255, 0.1);
backdrop-filter: blur(10px);
-webkit-backdrop-filter: blur(10px);
padding: 12px 28px;
border-radius: 50px;
border: 1px solid rgba(255, 255, 255, 0.15);
display: inline-block;
}

.scroll-indicator {
position: absolute;
bottom: 30px;
left: 50%;
transform: translateX(-50%);
animation: bounce-down 2s ease-in-out infinite;
}

.scroll-indicator a {
color: rgba(255, 255, 255, 0.7);
font-size: 1.5rem;
transition: all 0.3s ease;
}

.scroll-indicator a:hover {
color: #fff;
}

@keyframes bounce-down {

0%,
100% {
transform: translateX(-50%) translateY(0);
}

50% {
transform: translateX(-50%) translateY(12px);
}
}

/* ============================
GALLERY SECTION
============================ */
.gallery-section {
background: linear-gradient(135deg, #1abc9c 0%, #0e8c73 50%, #16a085 100%);
padding: 6rem 0;
position: relative;
}

.gallery-section::before {
content: '';
position: absolute;
top: 0;
left: 0;
right: 0;
bottom: 0;
background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
pointer-events: none;
}

.carousel-enhanced {
border-radius: 24px;
overflow: hidden;
box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
position: relative;
}

.carousel-enhanced .carousel-item img {
transition: transform 8s ease;
}

.carousel-enhanced .carousel-item.active img {
transform: scale(1.05);
}

.carousel-caption-custom {
position: absolute;
bottom: 0;
left: 0;
right: 0;
padding: 3.5rem 2rem 4.5rem;
background: linear-gradient(transparent, rgba(0, 0, 0, 0.75));
color: #fff;
z-index: 1;
}

.carousel-control-prev,
.carousel-control-next {
width: 50px;
height: 50px;
background: rgba(26, 188, 156, 0.8);
border-radius: 50%;
top: 50%;
transform: translateY(-50%);
margin: 0 15px;
opacity: 0;
transition: all 0.3s ease;
}

.carousel-enhanced:hover .carousel-control-prev,
.carousel-enhanced:hover .carousel-control-next {
opacity: 1;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
background: var(--primary);
transform: translateY(-50%) scale(1.1);
}

.carousel-indicators {
bottom: 15px;
}

.carousel-indicators button {
width: 12px;
height: 12px;
border-radius: 50%;
margin: 0 5px;
background: rgba(255, 255, 255, 0.5);
border: 2px solid rgba(255, 255, 255, 0.6);
transition: all 0.3s ease;
}

.carousel-indicators button.active {
background: var(--primary);
border-color: var(--primary);
transform: scale(1.3);
box-shadow: 0 0 10px rgba(26, 188, 156, 0.5);
}

/* ============================
VIDEO SECTION
============================ */
.video-section {
background: linear-gradient(180deg, #0e8c73 0%, #1abc9c 50%, #16a085 100%);
position: relative;
}

.video-card {
border-radius: 20px;
overflow: hidden;
box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
background: rgba(255, 255, 255, 0.95);
backdrop-filter: blur(10px);
border: 1px solid rgba(255, 255, 255, 0.2);
}

.video-card:hover {
transform: translateY(-8px) scale(1.02);
box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3), 0 0 30px rgba(26, 188, 156, 0.15);
}

.video-card iframe {
width: 100%;
height: 200px;
border: none;
}

.video-card .video-title {
padding: 1rem 1.25rem;
background: #fff;
}

.video-card .video-title h6 {
margin: 0;
color: var(--secondary);
font-weight: 700;
font-size: 0.9rem;
}

/* ============================
QUIZ SECTION
============================ */
.quiz-section {
background: linear-gradient(180deg, #16a085, #1abc9c, #48c9b0);
position: relative;
}

/* ============================
CONTACT SECTION
============================ */
.contact-section {
background: var(--gradient-dark);
position: relative;
}

.contact-section::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%231abc9c' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
pointer-events: none;
}

.contact-info-card {
background: rgba(255, 255, 255, 0.05);
border-radius: 16px;
padding: 2rem;
border: 1px solid rgba(255, 255, 255, 0.08);
transition: all 0.3s ease;
}

.contact-info-card:hover {
background: rgba(255, 255, 255, 0.08);
transform: translateY(-3px);
}

.contact-info-card i {
width: 50px;
height: 50px;
display: flex;
align-items: center;
justify-content: center;
background: rgba(26, 188, 156, 0.25);
border-radius: 12px;
color: #fff;
font-size: 1.3rem;
margin-bottom: 1rem;
}

/* ============================
RESPONSIVE
============================ */
@media (max-width: 991.98px) {
.masthead {
padding-top: 140px !important;
background-attachment: scroll;
}

.masthead-heading {
font-size: 3rem;
letter-spacing: 4px;
}

.masthead-avatar {
width: 10rem;
height: 10rem;
}

.masthead-subheading {
font-size: 1.1rem;
letter-spacing: 2px;
}

.carousel-enhanced {
border-radius: 16px;
}

.floating-shape {
display: none;
}
}

@media (max-width: 575.98px) {
.masthead-heading {
font-size: 2.2rem;
letter-spacing: 3px;
}

.masthead-avatar {
width: 8rem;
height: 8rem;
}

.masthead-subheading {
font-size: 0.95rem;
}

.masthead-motto {
font-size: 0.9rem;
padding: 10px 20px;
}

.video-card iframe {
height: 170px;
}

.carousel-enhanced .carousel-item div {
height: 250px !important;
}
}
@endsection

@section('content')
<!-- ============================================
     HERO / MASTHEAD
============================================= -->
<header class="masthead text-white text-center">
    <!-- Floating shapes -->
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>

    <div class="container d-flex align-items-center flex-column position-relative">
        @if(\App\Models\SiteSetting::getValue('site_logo'))
        <img class="masthead-avatar mb-4 rounded-circle"
            src="{{ asset('storage/' . \App\Models\SiteSetting::getValue('site_logo')) }}" alt="Logo"
            data-aos="zoom-in" data-aos-duration="1000" />
        @else
        <img class="masthead-avatar mb-4 rounded-circle"
            src="{{ asset('assets/img/logobasiru.png') }}" alt="BASIRU Logo"
            onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22240%22 height=%22240%22><circle cx=%22120%22 cy=%22120%22 r=%22120%22 fill=%22%231abc9c%22/><text x=%22120%22 y=%22130%22 text-anchor=%22middle%22 fill=%22white%22 font-size=%2236%22 font-family=%22Montserrat,sans-serif%22 font-weight=%22bold%22>BASIRU</text></svg>'"
            data-aos="zoom-in" data-aos-duration="1000" />
        @endif

        <h1 class="masthead-heading text-uppercase mb-0"
            data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">{{ \App\Models\SiteSetting::getValue('hero_heading', 'BASIRU') }}</h1>

        <div class="divider-custom divider-light" data-aos="fade-up" data-aos-delay="400">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <p class="masthead-subheading mb-0"
            data-aos="fade-up" data-aos-delay="500">{{ \App\Models\SiteSetting::getValue('hero_subheading', 'PENGEMBANGAN KOMPETENSI GURU') }}</p>

        <p class="masthead-motto mt-4"
            data-aos="fade-up" data-aos-delay="700">
            {{ \App\Models\SiteSetting::getValue('hero_motto', '"Aku bukan hanya mengajar, aku sedang menanam masa depan"') }}
        </p>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator" style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); z-index: 10;">
        <a href="#carousel-section"><i class="fas fa-chevron-down"></i></a>
    </div>
</header>

<!-- ============================================
     GALLERY CAROUSEL SECTION
============================================= -->
<section class="gallery-section" id="carousel-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge section-badge-light" data-aos="fade-up">
                <i class="fas fa-camera me-1"></i> Dokumentasi
            </span>
            <h2 class="display-5 fw-bold text-white mb-3" data-aos="fade-up" data-aos-delay="100">
                Galeri BASIRU
            </h2>
            <p class="lead mx-auto" style="max-width: 600px; color: rgba(255,255,255,0.75);" data-aos="fade-up" data-aos-delay="200">
                Dokumentasi kegiatan dan momen-momen berharga dalam pengembangan kompetensi guru PAUD
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9" data-aos="zoom-in-up" data-aos-delay="300">
                @if($galleries->count() > 0)
                <div id="basiruCarousel" class="carousel slide carousel-enhanced" data-bs-ride="carousel" data-bs-interval="4500">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach($galleries as $index => $gallery)
                        <button type="button" data-bs-target="#basiruCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach($galleries as $index => $gallery)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="position-relative" style="height: 480px; overflow: hidden;">
                                <img src="{{ $gallery->image_path && file_exists(storage_path('app/public/' . $gallery->image_path)) ? asset('storage/' . $gallery->image_path) : asset('assets/img/placeholder-gallery.svg') }}"
                                    class="w-100 h-100"
                                    style="object-fit: cover; object-position: center;"
                                    alt="{{ $gallery->title }}"
                                    onerror="this.src='{{ asset('assets/img/placeholder-gallery.svg') }}'">
                                <div class="d-none justify-content-center align-items-center text-center p-4 position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #1abc9c, #16a085);">
                                    <div class="text-white">
                                        <i class="fas fa-image fa-4x mb-3" style="opacity:0.5;"></i>
                                        <h4>{{ $gallery->title }}</h4>
                                        <p style="opacity:0.7;">{{ $gallery->description ?? 'Dokumentasi Kegiatan BASIRU' }}</p>
                                    </div>
                                </div>
                                <!-- Caption overlay -->
                                <div class="carousel-caption-custom">
                                    <h5 class="fw-bold mb-1">{{ $gallery->title }}</h5>
                                    @if($gallery->description)
                                    <p class="mb-0 small" style="opacity:0.8;">{{ $gallery->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#basiruCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#basiruCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                @else
                <div class="text-center text-white py-5">
                    <i class="fas fa-images fa-4x mb-3" style="opacity:0.4;"></i>
                    <p class="lead">Galeri foto akan segera tersedia</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Wave -->
    <div class="wave-separator">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#0e8c73" d="M0,20 C360,70 720,0 1080,50 C1260,65 1360,30 1440,20 L1440,80 L0,80 Z"></path>
        </svg>
    </div>
</section>

<!-- ============================================
     VIDEO SECTION
============================================= -->
<section class="page-section video-section text-white" id="about">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge section-badge-light" data-aos="fade-up">
                <i class="fas fa-play me-1"></i> Pembelajaran
            </span>
            <h2 class="page-section-heading text-uppercase text-white" data-aos="fade-up" data-aos-delay="100">
                Video Pembelajaran
            </h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6" data-aos="fade-right">
                <p class="lead" style="opacity:0.9;">Video pembelajaran di sini semoga bermanfaat dan dapat dijadikan referensi untuk diterapkan sesuai dengan kebutuhan</p>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <p class="lead" style="opacity:0.9;">Jika ada video pembelajaran yang ingin di tampilkan di sini bisa kontak via email ya..</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($videos as $index => $video)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="video-card">
                    <iframe src="{{ $video->embed_url }}" title="{{ $video->title }}"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                        loading="lazy"></iframe>
                    <div class="video-title">
                        <h6 class="text-truncate">{{ $video->title }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a class="btn btn-xl btn-outline-light" href="https://www.youtube.com/@nilafitria2119/videos" target="_blank">
                <i class="fa-brands fa-youtube me-2"></i> Video Lengkapnya!
            </a>
        </div>
    </div>

    <!-- Wave -->
    <div class="wave-separator">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#16a085" d="M0,50 C480,0 960,80 1440,30 L1440,80 L0,80 Z"></path>
        </svg>
    </div>
</section>

<!-- ============================================
     QUIZ SECTION
============================================= -->
<section class="page-section quiz-section text-white" id="refleksi">
    <div class="container-fluid">
        <div class="text-center mb-5">
            <span class="section-badge section-badge-light" data-aos="fade-up">
                <i class="fas fa-brain me-1"></i> Refleksi
            </span>
            <h2 class="page-section-heading text-uppercase text-white" data-aos="fade-up" data-aos-delay="100">
                QUIZ
            </h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>

        @if($quiz)
        <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div style="width: 100%; max-width: 680px; background: rgba(255,255,255,0.08); border-radius: 16px; padding: 8px; border: 1px solid rgba(255,255,255,0.1);">
                <iframe src="{{ $quiz->google_form_url }}" width="100%" height="12199" frameborder="0"
                    marginheight="0" marginwidth="0"
                    style="border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.15);"
                    loading="lazy">Loading…</iframe>
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-question-circle fa-4x mb-3" style="opacity:0.4;"></i>
            <p class="lead">Quiz akan segera tersedia</p>
        </div>
        @endif
    </div>

    <!-- Wave -->
    <div class="wave-separator">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#2c3e50" d="M0,30 C240,70 480,0 720,40 C960,80 1200,10 1440,50 L1440,80 L0,80 Z"></path>
        </svg>
    </div>
</section>

<!-- ============================================
     CONTACT SECTION
============================================= -->
<section class="page-section contact-section" id="contact">
    <div class="container position-relative">
        <div class="text-center mb-5">
            <span class="section-badge section-badge-light" data-aos="fade-up">
                <i class="fas fa-paper-plane me-1"></i> Kontak
            </span>
            <h2 class="page-section-heading text-uppercase text-white" data-aos="fade-up" data-aos-delay="100">
                Hubungi Kami
            </h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            <!-- Contact Info -->
            <div class="col-lg-4" data-aos="fade-right">
                <div class="contact-info-card mb-4">
                    <i class="fas fa-map-marker-alt text-white"></i>
                    <h6 class="text-white fw-bold">Alamat</h6>
                    <p class="text-white mb-0" style="opacity:0.7; font-size: 0.95rem;">Universitas Negeri Jakarta<br>Rawamangun, Jakarta Timur</p>
                </div>
                <div class="contact-info-card mb-4">
                    <i class="fas fa-envelope text-white"></i>
                    <h6 class="text-white fw-bold">Email</h6>
                    <p class="text-white mb-0" style="opacity:0.7; font-size: 0.95rem;">info@basiru.my.id</p>
                </div>
                <div class="contact-info-card">
                    <i class="fas fa-globe text-white"></i>
                    <h6 class="text-white fw-bold">Website</h6>
                    <p class="text-white mb-0" style="opacity:0.7; font-size: 0.95rem;">basiru.my.id</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 16px; border: none; box-shadow: 0 4px 15px rgba(26,188,156,0.3);">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="modern-form">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control modern-input @error('name') is-invalid @enderror"
                                    id="name" name="name" type="text" placeholder="Nama" value="{{ old('name') }}" required />
                                <label for="name">Nama Lengkap</label>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control modern-input @error('email') is-invalid @enderror"
                                    id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required />
                                <label for="email">Email</label>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <input class="form-control modern-input @error('phone') is-invalid @enderror"
                            id="phone" name="phone" type="text" placeholder="Telepon" value="{{ old('phone') }}" />
                        <label for="phone">No. Telepon (opsional)</label>
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-floating mt-3">
                        <textarea class="form-control modern-input @error('message') is-invalid @enderror"
                            id="message" name="message" placeholder="Pesan" style="height: 10rem" required>{{ old('message') }}</textarea>
                        <label for="message">Pesan Anda</label>
                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-primary btn-xl modern-button w-100 mt-4" type="submit">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection