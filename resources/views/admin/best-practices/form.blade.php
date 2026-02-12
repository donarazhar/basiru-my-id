@extends('layouts.admin')
@section('page-title', isset($practice) ? 'Edit Praktik Baik' : 'Tambah Praktik Baik')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.best-practices.index') }}" class="text-muted text-decoration-none small">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
    </a>
</div>

<div class="card admin-card">
    <div class="card-header">
        <h6 class="mb-0 fw-bold">
            <i class="fas fa-{{ isset($practice) ? 'edit' : 'plus-circle' }} me-2 text-primary"></i>
            {{ isset($practice) ? 'Edit Praktik Baik' : 'Tambah Praktik Baik Baru' }}
        </h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ isset($practice) ? route('admin.best-practices.update', $practice) : route('admin.best-practices.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($practice)) @method('PUT') @endif

            <div class="mb-4">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-lg" value="{{ old('title', $practice->title ?? '') }}" required placeholder="Masukkan judul praktik baik...">
            </div>

            <div class="mb-4">
                <label class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea name="content" id="content" class="form-control" rows="15">{{ old('content', $practice->content ?? '') }}</textarea>
                <small class="text-muted mt-1 d-block"><i class="fas fa-info-circle me-1"></i> Gunakan editor di atas untuk memformat konten</small>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Gambar Cover</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if(isset($practice) && $practice->image_path)
                    <div class="mt-2 p-2 bg-light rounded">
                        <img src="{{ asset('storage/' . $practice->image_path) }}" class="rounded" width="200" style="object-fit:cover;">
                        <small class="d-block text-muted mt-1">Cover saat ini</small>
                    </div>
                    @else
                    <small class="text-muted">JPG, PNG, WebP. Maks 2MB</small>
                    @endif
                </div>
                <div class="col-md-3 mb-4">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $practice->author ?? '') }}" placeholder="Nama penulis">
                </div>
                <div class="col-md-3 mb-4 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $practice->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-5 py-2">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.best-practices.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
{{-- TinyMCE Self-Hosted (No API Key Required) --}}
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
        height: 500,
        menubar: true,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks fontsize | ' +
            'bold italic underline strikethrough | forecolor backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | removeformat | ' +
            'link image media table | code fullscreen | help',
        content_style: 'body { font-family: Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; }',
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        ]
    });
</script>
@endsection