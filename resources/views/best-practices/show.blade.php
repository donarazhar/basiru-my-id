@extends('layouts.app')
@section('title', $practice->title . ' - BASIRU')

@php
$ogImage = $practice->image_path && file_exists(storage_path('app/public/' . $practice->image_path))
? asset('storage/' . $practice->image_path)
: asset('assets/img/placeholder-article.svg');
$ogDescription = Str::limit(strip_tags($practice->content), 160);
$shareUrl = route('best-practices.show', $practice->id);
@endphp

@section('meta')
<!-- Open Graph / Facebook / WhatsApp -->
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ $shareUrl }}" />
<meta property="og:title" content="{{ $practice->title }}" />
<meta property="og:description" content="{{ $ogDescription }}" />
<meta property="og:image" content="{{ $ogImage }}" />
<meta property="og:site_name" content="BASIRU" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $practice->title }}" />
<meta name="twitter:description" content="{{ $ogDescription }}" />
<meta name="twitter:image" content="{{ $ogImage }}" />
@endsection

@section('content')
<div style="padding-top: 120px; min-height: 100vh; background: #f8f9fa;">
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--primary);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('best-practices.index') }}" class="text-decoration-none" style="color: var(--primary);">Praktik Baik</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($practice->title, 40) }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                    @if($practice->image_path && file_exists(storage_path('app/public/' . $practice->image_path)))
                    <img src="{{ asset('storage/' . $practice->image_path) }}" class="w-100 rounded-3 mb-4" alt="{{ $practice->title }}" style="max-height: 400px; object-fit: cover;">
                    @else
                    <img src="{{ asset('assets/img/placeholder-article.svg') }}" class="w-100 rounded-3 mb-4" alt="{{ $practice->title }}" style="max-height: 400px; object-fit: cover;">
                    @endif

                    <h1 class="fw-bold text-secondary mb-3" style="font-size: 2rem;">{{ $practice->title }}</h1>

                    <div class="d-flex align-items-center text-muted mb-4 pb-3 border-bottom">
                        <span class="me-3"><i class="fas fa-user me-1"></i> {{ $practice->author ?? 'Admin' }}</span>
                        <span><i class="fas fa-calendar me-1"></i> {{ $practice->created_at->format('d M Y') }}</span>
                    </div>

                    <div class="content-body" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! $practice->content !!}
                    </div>

                    {{-- ================================
                         SHARE BUTTONS
                    ================================= --}}
                    <div class="share-section mt-5 pt-4 border-top">
                        <h6 class="fw-bold text-secondary mb-3">
                            <i class="fas fa-share-alt me-2" style="color: var(--primary);"></i>Bagikan Artikel
                        </h6>
                        <div class="d-flex flex-wrap gap-2">
                            {{-- WhatsApp --}}
                            <a href="https://wa.me/?text={{ urlencode($practice->title . "\n\n" . Str::limit(strip_tags($practice->content), 100) . "\n\nBaca selengkapnya:\n" . $shareUrl) }}"
                                target="_blank" rel="noopener"
                                class="btn btn-share btn-share-wa">
                                <i class="fab fa-whatsapp me-2"></i> WhatsApp
                            </a>

                            {{-- Copy Link --}}
                            <button type="button" class="btn btn-share btn-share-copy" id="btnCopyLink" onclick="copyLink()">
                                <i class="fas fa-link me-2" id="copyIcon"></i>
                                <span id="copyText">Salin Link</span>
                            </button>

                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}"
                                target="_blank" rel="noopener"
                                class="btn btn-share btn-share-fb">
                                <i class="fab fa-facebook-f me-2"></i> Facebook
                            </a>

                            {{-- Twitter / X --}}
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($practice->title) }}"
                                target="_blank" rel="noopener"
                                class="btn btn-share btn-share-tw">
                                <i class="fab fa-twitter me-2"></i> Twitter
                            </a>
                        </div>
                    </div>
                </article>

                @if($related->count() > 0)
                <div class="mt-5">
                    <h4 class="fw-bold text-secondary mb-4">Artikel Terkait</h4>
                    <div class="row g-3">
                        @foreach($related as $item)
                        <div class="col-md-4">
                            <a href="{{ route('best-practices.show', $item->id) }}" class="text-decoration-none">
                                <div class="card card-hover h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-secondary">{{ Str::limit($item->title, 50) }}</h6>
                                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
.btn-share {
padding: 0.55rem 1.2rem;
border-radius: 50px;
font-size: 0.85rem;
font-weight: 600;
border: none;
color: #fff;
transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
display: inline-flex;
align-items: center;
text-decoration: none;
cursor: pointer;
}

.btn-share:hover {
transform: translateY(-3px);
color: #fff;
}

.btn-share-wa {
background: linear-gradient(135deg, #25D366, #128C7E);
box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
}

.btn-share-wa:hover {
box-shadow: 0 8px 25px rgba(37, 211, 102, 0.5);
}

.btn-share-copy {
background: linear-gradient(135deg, #6366f1, #4f46e5);
box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
}

.btn-share-copy:hover {
box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
}

.btn-share-copy.copied {
background: linear-gradient(135deg, #10b981, #059669) !important;
box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4) !important;
}

.btn-share-fb {
background: linear-gradient(135deg, #1877F2, #0C63D4);
box-shadow: 0 4px 15px rgba(24, 119, 242, 0.3);
}

.btn-share-fb:hover {
box-shadow: 0 8px 25px rgba(24, 119, 242, 0.5);
}

.btn-share-tw {
background: linear-gradient(135deg, #1DA1F2, #0C85D0);
box-shadow: 0 4px 15px rgba(29, 161, 242, 0.3);
}

.btn-share-tw:hover {
box-shadow: 0 8px 25px rgba(29, 161, 242, 0.5);
}

.share-section {
border-top: 2px dashed #e2e8f0 !important;
}

@media (max-width: 575.98px) {
.btn-share {
padding: 0.5rem 1rem;
font-size: 0.8rem;
}
}
@endsection

@section('scripts')
<script>
    function copyLink() {
        const url = '{{ $shareUrl }}';
        const btn = document.getElementById('btnCopyLink');
        const icon = document.getElementById('copyIcon');
        const text = document.getElementById('copyText');

        navigator.clipboard.writeText(url).then(function() {
            btn.classList.add('copied');
            icon.className = 'fas fa-check me-2';
            text.textContent = 'Tersalin!';

            setTimeout(function() {
                btn.classList.remove('copied');
                icon.className = 'fas fa-link me-2';
                text.textContent = 'Salin Link';
            }, 2500);
        }).catch(function() {
            // Fallback for older browsers
            const input = document.createElement('input');
            input.value = url;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);

            btn.classList.add('copied');
            icon.className = 'fas fa-check me-2';
            text.textContent = 'Tersalin!';

            setTimeout(function() {
                btn.classList.remove('copied');
                icon.className = 'fas fa-link me-2';
                text.textContent = 'Salin Link';
            }, 2500);
        });
    }
</script>
@endsection