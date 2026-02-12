@extends('layouts.admin')
@section('page-title', 'Kelola Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Daftar Galeri</h5>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus me-1"></i> Tambah Galeri</a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->id }}</td>
                        <td><img src="{{ $gallery->image_path && file_exists(storage_path('app/public/' . $gallery->image_path)) ? asset('storage/' . $gallery->image_path) : asset('assets/img/placeholder-gallery.svg') }}" width="80" height="50" style="object-fit:cover; border-radius:6px;" onerror="this.src='{{ asset('assets/img/placeholder-gallery.svg') }}'"></td>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->order }}</td>
                        <td><span class="badge {{ $gallery->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">{{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td>
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-warning rounded-pill"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" class="d-inline" onsubmit="return confirm('Hapus galeri ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data galeri</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $galleries->links('vendor.pagination.custom-admin') }}</div>
@endsection