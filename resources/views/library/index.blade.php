@extends('layouts.app')
@section('title', 'Perpustakaan Digital - BASIRU')

@section('content')
<div style="padding-top: 120px; min-height: 100vh; background: #f8f9fa;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="page-section-heading text-uppercase text-secondary">Perpustakaan Digital</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-book"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="lead text-muted">Koleksi bahan pustaka digital untuk pengembangan kompetensi guru PAUD</p>
        </div>

        <!-- Category Filter -->
        @if($categories->count() > 0)
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <a href="{{ route('library.index') }}" class="btn btn-sm {{ !$category ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">
                Semua
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('library.index', ['category' => $cat]) }}" class="btn btn-sm {{ $category === $cat ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        @endif

        <div class="row g-4">
            @forelse($items as $item)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card card-hover h-100">
                    @if($item->cover_image && file_exists(storage_path('app/public/' . $item->cover_image)))
                    <img src="{{ asset('storage/' . $item->cover_image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="{{ asset('assets/img/placeholder-file.svg') }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover; background: #f0f4f8;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold text-secondary">{{ $item->title }}</h6>
                        @if($item->category)
                        <span class="badge bg-primary mb-2 align-self-start rounded-pill">{{ $item->category }}</span>
                        @endif
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($item->description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <small class="text-muted">{{ $item->author ?? '' }}</small>
                            <a href="{{ asset('storage/' . $item->file_path) }}" class="btn btn-sm btn-primary rounded-pill px-3" target="_blank">
                                <i class="fas fa-download me-1"></i> Unduh
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                <p class="lead text-muted">Belum ada item perpustakaan yang tersedia</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $items->appends(['category' => $category])->links() }}
        </div>
    </div>
</div>
@endsection