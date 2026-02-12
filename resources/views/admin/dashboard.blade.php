@extends('layouts.admin')
@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="card admin-card mb-4" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); color: #fff;">
    <div class="card-body py-4 px-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-1"><i class="fas fa-hand-sparkles me-2"></i> Selamat Datang, {{ Auth::user()->name }}!</h5>
                <p class="mb-0 small opacity-75">Berikut ringkasan konten website BASIRU Anda.</p>
            </div>
            <div class="col-md-4 text-md-end mt-2 mt-md-0">
                <span class="badge rounded-pill" style="background: rgba(26,188,156,0.2); color: #1abc9c; padding: 8px 16px;">
                    <i class="fas fa-calendar-alt me-1"></i> {{ now()->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Stats Row 1 -->
<div class="row g-3 mb-3">
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #1abc9c, #16a085);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Galeri</p>
                    <h3 class="mb-0">{{ $stats['galleries'] }}</h3>
                </div>
                <i class="fas fa-images fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #3498db, #2980b9);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Video</p>
                    <h3 class="mb-0">{{ $stats['videos'] }}</h3>
                </div>
                <i class="fas fa-play-circle fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #9b59b6, #8e44ad);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Praktik Baik</p>
                    <h3 class="mb-0">{{ $stats['practices'] }}</h3>
                </div>
                <i class="fas fa-lightbulb fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Pesan Baru</p>
                    <h3 class="mb-0">{{ $stats['contacts'] }}</h3>
                </div>
                <i class="fas fa-envelope fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Stats Row 2 -->
<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #f39c12, #e67e22);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Buku Digital</p>
                    <h3 class="mb-0">{{ $stats['books'] }}</h3>
                </div>
                <i class="fas fa-book-open fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #2c3e50, #34495e);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Perpustakaan</p>
                    <h3 class="mb-0">{{ $stats['library'] }}</h3>
                </div>
                <i class="fas fa-book fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #1abc9c, #0e8c73);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Quiz</p>
                    <h3 class="mb-0">{{ $stats['quizzes'] }}</h3>
                </div>
                <i class="fas fa-puzzle-piece fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #636e72, #2d3436);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="small mb-1 opacity-75">Total Pesan</p>
                    <h3 class="mb-0">{{ $stats['total_contacts'] }}</h3>
                </div>
                <i class="fas fa-inbox fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Contacts -->
@if($recentContacts->count() > 0)
<div class="card admin-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">
            <i class="fas fa-clock me-2 text-primary"></i> Pesan Terbaru
        </h6>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
            Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentContacts as $contact)
                    <tr>
                        <td class="fw-semibold">{{ $contact->name }}</td>
                        <td class="text-muted">{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->message, 50) }}</td>
                        <td class="text-muted small">{{ $contact->created_at->diffForHumans() }}</td>
                        <td>
                            @if($contact->is_read)
                            <span class="badge bg-success rounded-pill"><i class="fas fa-check me-1"></i> Dibaca</span>
                            @else
                            <span class="badge bg-warning rounded-pill"><i class="fas fa-bell me-1"></i> Baru</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection