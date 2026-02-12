@extends('layouts.admin')
@section('page-title', isset($quiz) ? 'Edit Quiz' : 'Tambah Quiz')

@section('content')
<div class="card admin-card">
    <div class="card-body p-4">
        <form method="POST" action="{{ isset($quiz) ? route('admin.quizzes.update', $quiz) : route('admin.quizzes.store') }}">
            @csrf
            @if(isset($quiz)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $quiz->title ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $quiz->description ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Google Form URL (Embed) <span class="text-danger">*</span></label>
                <input type="text" name="google_form_url" class="form-control" value="{{ old('google_form_url', $quiz->google_form_url ?? '') }}" required placeholder="https://docs.google.com/forms/d/e/.../viewform?embedded=true">
                <small class="text-muted">Gunakan URL embed dari Google Form</small>
            </div>
            <div class="mb-3 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $quiz->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Aktif</label>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.quizzes.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection