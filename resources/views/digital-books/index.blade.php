@extends('layouts.app')
@section('title', 'Buku Digital - BASIRU')

@section('content')
<div style="padding-top: 120px; min-height: 100vh; background: #f8f9fa;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="page-section-heading text-uppercase text-secondary">Buku Digital</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-tablet-alt"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="lead text-muted">Koleksi buku digital interaktif untuk guru PAUD</p>
        </div>

        <div class="row g-4">
            @forelse($books as $book)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card card-hover h-100">
                    @if($book->cover_image && file_exists(storage_path('app/public/' . $book->cover_image)))
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 250px; object-fit: cover;">
                    @else
                    <img src="{{ asset('assets/img/placeholder-document.svg') }}" class="card-img-top" alt="{{ $book->title }}" style="height: 250px; object-fit: cover; background: #fef9e7;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold text-secondary">{{ $book->title }}</h6>
                        @if($book->author)
                        <p class="text-muted small mb-2"><i class="fas fa-user-edit me-1"></i> {{ $book->author }}</p>
                        @endif
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($book->description, 80) }}</p>
                        <a href="{{ route('digital-books.show', $book->id) }}" class="btn btn-primary rounded-pill w-100 mt-2">
                            <i class="fas fa-book-reader me-1"></i> Baca Buku
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-tablet-alt fa-4x text-muted mb-3"></i>
                <p class="lead text-muted">Belum ada buku digital yang tersedia</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection