@extends('layouts.app')
@section('title', $book->title . ' - BASIRU')

@section('content')
<div style="padding-top: 80px; min-height: 100vh; background: #2c3e50;">
    <div class="container-fluid py-3">
        <div class="d-flex justify-content-between align-items-center mb-3 px-3">
            <div class="d-flex align-items-center">
                <a href="{{ route('digital-books.index') }}" class="btn btn-outline-light btn-sm me-3 rounded-pill">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <h5 class="text-white mb-0">{{ $book->title }}</h5>
            </div>
            <a href="{{ asset('storage/' . $book->file_path) }}" class="btn btn-primary btn-sm rounded-pill" download>
                <i class="fas fa-download me-1"></i> Download PDF
            </a>
        </div>

        <div class="d-flex justify-content-center">
            <iframe src="{{ asset('storage/' . $book->file_path) }}" width="100%" style="height: calc(100vh - 130px); border: none; border-radius: 8px;" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection