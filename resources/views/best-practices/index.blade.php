@extends('layouts.app')
@section('title', 'Praktik Baik - BASIRU')

@section('content')
<div style="padding-top: 120px; min-height: 100vh; background: #f8f9fa;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="page-section-heading text-uppercase text-secondary">Praktik Baik</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="lead text-muted">Kumpulan praktik baik dalam pengembangan kompetensi guru PAUD</p>
        </div>

        <div class="row g-4">
            @forelse($practices as $practice)
            <div class="col-md-6 col-lg-4">
                <div class="card card-hover h-100">
                    @if($practice->image_path && file_exists(storage_path('app/public/' . $practice->image_path)))
                    <img src="{{ asset('storage/' . $practice->image_path) }}" class="card-img-top" alt="{{ $practice->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="{{ asset('assets/img/placeholder-article.svg') }}" class="card-img-top" alt="{{ $practice->title }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-secondary">{{ $practice->title }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($practice->content), 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted"><i class="fas fa-user me-1"></i> {{ $practice->author ?? 'Admin' }}</small>
                            <a href="{{ route('best-practices.show', $practice->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                Baca <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                <p class="lead text-muted">Belum ada praktik baik yang dipublikasikan</p>
            </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $practices->links() }}
        </div>
    </div>
</div>
@endsection