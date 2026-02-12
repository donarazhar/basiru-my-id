@extends('layouts.admin')
@section('page-title', 'Detail Pesan')

@section('content')
<div class="card admin-card">
    <div class="card-body p-4">
        <div class="mb-4">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold text-muted small">Nama</label>
                <p class="fw-bold">{{ $contact->name }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold text-muted small">Email</label>
                <p><a href="mailto:{{ $contact->email }}" class="text-primary">{{ $contact->email }}</a></p>
            </div>
        </div>

        @if($contact->phone)
        <div class="mb-3">
            <label class="form-label fw-bold text-muted small">Telepon</label>
            <p>{{ $contact->phone }}</p>
        </div>
        @endif

        <div class="mb-3">
            <label class="form-label fw-bold text-muted small">Tanggal</label>
            <p>{{ $contact->created_at->format('d M Y, H:i') }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold text-muted small">Pesan</label>
            <div class="bg-light p-3 rounded-3" style="white-space: pre-wrap;">{{ $contact->message }}</div>
        </div>
    </div>
</div>
@endsection