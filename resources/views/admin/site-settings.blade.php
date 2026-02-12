@extends('layouts.admin')
@section('page-title', 'Pengaturan Situs')

@section('content')
<form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data">
    @csrf

    {{-- ============================================
         SECTION 1: IDENTITAS SITUS
    ============================================= --}}
    <div class="card admin-card mb-4">
        <div class="card-header bg-white border-0 py-3">
            <h6 class="mb-0 fw-bold text-secondary">
                <i class="fas fa-globe me-2 text-primary"></i> Identitas Situs
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Judul Website <span class="text-danger">*</span></label>
                    <input type="text" name="site_title" class="form-control" value="{{ old('site_title', $settings['site_title']) }}" required>
                    <small class="text-muted">Ditampilkan di tab browser & judul halaman</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Deskripsi Website</label>
                    <input type="text" name="site_description" class="form-control" value="{{ old('site_description', $settings['site_description']) }}">
                    <small class="text-muted">Meta description untuk SEO</small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Logo Website</label>
                    <input type="file" name="site_logo" class="form-control" accept="image/*">
                    @if($settings['site_logo'])
                    <div class="mt-2 p-3 rounded" style="background: linear-gradient(135deg, #1abc9c, #16a085); display:inline-block;">
                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo" style="max-height: 80px; border-radius: 50%;">
                    </div>
                    <small class="d-block text-muted mt-1">Logo saat ini (ditampilkan di hero section)</small>
                    @else
                    <small class="text-muted">Upload logo (ditampilkan di hero section, bulat). JPG, PNG, SVG max 2MB</small>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Favicon</label>
                    <input type="file" name="site_favicon" class="form-control" accept="image/*,.ico">
                    @if($settings['site_favicon'])
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $settings['site_favicon']) }}" alt="Favicon" style="max-height: 32px;">
                    </div>
                    <small class="d-block text-muted mt-1">Favicon saat ini (ikon di tab browser)</small>
                    @else
                    <small class="text-muted">Upload favicon (ikon tab browser). ICO, PNG, SVG max 2MB</small>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================
         SECTION 2: HERO SECTION
    ============================================= --}}
    <div class="card admin-card mb-4">
        <div class="card-header bg-white border-0 py-3">
            <h6 class="mb-0 fw-bold text-secondary">
                <i class="fas fa-star me-2" style="color: #f39c12;"></i> Hero Section (Halaman Utama)
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="mb-3">
                <label class="form-label fw-bold">Heading Utama</label>
                <input type="text" name="hero_heading" class="form-control form-control-lg" value="{{ old('hero_heading', $settings['hero_heading']) }}">
                <small class="text-muted">Judul besar yang muncul di hero section</small>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Sub-Heading</label>
                <input type="text" name="hero_subheading" class="form-control" value="{{ old('hero_subheading', $settings['hero_subheading']) }}">
                <small class="text-muted">Teks di bawah judul utama</small>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Motto / Kutipan</label>
                <input type="text" name="hero_motto" class="form-control" value="{{ old('hero_motto', $settings['hero_motto']) }}">
                <small class="text-muted">Kutipan inspiratif di bawah sub-heading</small>
            </div>
        </div>
    </div>

    {{-- ============================================
         SECTION 3: KONTAK & SOSIAL MEDIA
    ============================================= --}}
    <div class="card admin-card mb-4">
        <div class="card-header bg-white border-0 py-3">
            <h6 class="mb-0 fw-bold text-secondary">
                <i class="fas fa-share-alt me-2" style="color: #3498db;"></i> Kontak & Sosial Media
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold"><i class="fas fa-envelope me-1 text-danger"></i> Email Kontak</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email']) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold"><i class="fab fa-youtube me-1 text-danger"></i> YouTube URL</label>
                    <input type="url" name="youtube_url" class="form-control" value="{{ old('youtube_url', $settings['youtube_url']) }}" placeholder="https://youtube.com/...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold"><i class="fab fa-facebook me-1" style="color:#1877F2;"></i> Facebook URL</label>
                    <input type="url" name="facebook_url" class="form-control" value="{{ old('facebook_url', $settings['facebook_url']) }}" placeholder="https://facebook.com/...">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold"><i class="fab fa-instagram me-1" style="color:#E4405F;"></i> Instagram URL</label>
                    <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $settings['instagram_url']) }}" placeholder="https://instagram.com/...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold"><i class="fab fa-twitter me-1" style="color:#1DA1F2;"></i> Twitter / X URL</label>
                    <input type="url" name="twitter_url" class="form-control" value="{{ old('twitter_url', $settings['twitter_url']) }}" placeholder="https://twitter.com/...">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold"><i class="fab fa-linkedin me-1" style="color:#0A66C2;"></i> LinkedIn URL</label>
                    <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $settings['linkedin_url']) }}" placeholder="https://linkedin.com/...">
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================
         SECTION 4: FOOTER
    ============================================= --}}
    <div class="card admin-card mb-4">
        <div class="card-header bg-white border-0 py-3">
            <h6 class="mb-0 fw-bold text-secondary">
                <i class="fas fa-shoe-prints me-2" style="color: #9b59b6;"></i> Footer
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Nama Organisasi</label>
                    <input type="text" name="footer_org" class="form-control" value="{{ old('footer_org', $settings['footer_org']) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Copyright</label>
                    <input type="text" name="footer_copyright" class="form-control" value="{{ old('footer_copyright', $settings['footer_copyright']) }}">
                    <small class="text-muted">Contoh: Nila Fitria 2023</small>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat</label>
                <textarea name="footer_address" class="form-control" rows="2">{{ old('footer_address', $settings['footer_address']) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Tentang (About)</label>
                <textarea name="footer_about" class="form-control" rows="3">{{ old('footer_about', $settings['footer_about']) }}</textarea>
                <small class="text-muted">Deskripsi singkat di bagian footer</small>
            </div>
        </div>
    </div>

    {{-- Save Button --}}
    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2">
            <i class="fas fa-save me-2"></i> Simpan Pengaturan
        </button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Batal</a>
    </div>
</form>
@endsection