@extends('layouts.app')
@section('title', $practice->title . ' - BASIRU')

@section('content')
<div style="padding-top: 120px; min-height: 100vh; background: #f8f9fa;">
    <div class="container py-5">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--primary);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('best-practices.index') }}" class="text-decoration-none" style="color: var(--primary);">Praktik Baik</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($practice->title, 40) }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                    @if($practice->image_path)
                    <img src="{{ asset('storage/' . $practice->image_path) }}" class="w-100 rounded-3 mb-4" alt="{{ $practice->title }}" style="max-height: 400px; object-fit: cover;">
                    @endif

                    <h1 class="fw-bold text-secondary mb-3" style="font-size: 2rem;">{{ $practice->title }}</h1>

                    <div class="d-flex align-items-center text-muted mb-4 pb-3 border-bottom">
                        <span class="me-3"><i class="fas fa-user me-1"></i> {{ $practice->author ?? 'Admin' }}</span>
                        <span><i class="fas fa-calendar me-1"></i> {{ $practice->created_at->format('d M Y') }}</span>
                    </div>

                    <div class="content-body" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! $practice->content !!}
                    </div>
                </article>

                @if($related->count() > 0)
                <div class="mt-5">
                    <h4 class="fw-bold text-secondary mb-4">Artikel Terkait</h4>
                    <div class="row g-3">
                        @foreach($related as $item)
                        <div class="col-md-4">
                            <a href="{{ route('best-practices.show', $item->id) }}" class="text-decoration-none">
                                <div class="card card-hover h-100">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-secondary">{{ Str::limit($item->title, 50) }}</h6>
                                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection