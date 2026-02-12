@extends('layouts.admin')
@section('page-title', isset($gallery) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
<div class="card admin-card">
    <div class="card-body p-4">
        <form method="POST" action="{{ isset($gallery) ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($gallery)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Gambar {{ isset($gallery) ? '' : '*' }}</label>
                <input type="file" name="image" class="form-control" {{ isset($gallery) ? '' : 'required' }} accept="image/*">
                @if(isset($gallery) && $gallery->image_path)
                <img src="{{ asset('storage/' . $gallery->image_path) }}" class="mt-2" width="200" style="border-radius:8px;">
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $gallery->description ?? '') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Urutan</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $gallery->order ?? 0) }}">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection