@extends('layouts.admin')
@section('page-title', isset($video) ? 'Edit Video' : 'Tambah Video')

@section('content')
<div class="card admin-card">
    <div class="card-body p-4">
        <form method="POST" action="{{ isset($video) ? route('admin.videos.update', $video) : route('admin.videos.store') }}">
            @csrf
            @if(isset($video)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $video->title ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">YouTube URL (Embed) <span class="text-danger">*</span></label>
                <input type="text" name="youtube_url" class="form-control" value="{{ old('youtube_url', $video->youtube_url ?? '') }}" required placeholder="https://www.youtube.com/embed/xxxxx">
                <small class="text-muted">Gunakan format embed URL, contoh: https://www.youtube.com/embed/VIDEO_ID</small>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $video->description ?? '') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Urutan</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $video->order ?? 0) }}">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $video->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection