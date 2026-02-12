@extends('layouts.admin')
@section('page-title', isset($item) ? 'Edit Item Perpustakaan' : 'Tambah Item Perpustakaan')

@section('content')
<div class="card admin-card">
    <div class="card-body p-4">
        <form method="POST" action="{{ isset($item) ? route('admin.library.update', $item) : route('admin.library.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($item)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $item->description ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">File (PDF/DOC/PPT) {{ isset($item) ? '' : '*' }}</label>
                <input type="file" name="file" class="form-control" {{ isset($item) ? '' : 'required' }} accept=".pdf,.doc,.docx,.ppt,.pptx">
                @if(isset($item))<small class="text-muted">File saat ini: {{ basename($item->file_path) }}</small>@endif
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Cover Image</label>
                <input type="file" name="cover" class="form-control" accept="image/*">
                @if(isset($item) && $item->cover_image)
                <img src="{{ asset('storage/' . $item->cover_image) }}" class="mt-2" width="150" style="border-radius:8px;">
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{ old('category', $item->category ?? '') }}" placeholder="Contoh: Kurikulum, Modul">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Penulis</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $item->author ?? '') }}">
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.library.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection