@extends('layouts.admin')
@section('page-title', isset($book) ? 'Edit Buku Digital' : 'Tambah Buku Digital')

@section('content')
<div class="card admin-card">
    <div class="card-body p-4">
        <form method="POST" action="{{ isset($book) ? route('admin.digital-books.update', $book) : route('admin.digital-books.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($book)) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $book->description ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">File PDF {{ isset($book) ? '' : '*' }}</label>
                <input type="file" name="file" class="form-control" {{ isset($book) ? '' : 'required' }} accept=".pdf">
                @if(isset($book))<small class="text-muted">File saat ini: {{ basename($book->file_path) }}</small>@endif
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Cover Image</label>
                <input type="file" name="cover" class="form-control" accept="image/*">
                @if(isset($book) && $book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="mt-2" width="150" style="border-radius:8px;">
                @endif
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Penulis</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $book->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="{{ route('admin.digital-books.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection