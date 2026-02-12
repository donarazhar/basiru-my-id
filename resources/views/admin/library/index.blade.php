@extends('layouts.admin')
@section('page-title', 'Kelola Perpustakaan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Daftar Perpustakaan</h5>
    <a href="{{ route('admin.library.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus me-1"></i> Tambah</a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ Str::limit($item->title, 40) }}</td>
                        <td><span class="badge bg-primary rounded-pill">{{ $item->category ?? '-' }}</span></td>
                        <td>{{ $item->author ?? '-' }}</td>
                        <td><span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td>
                            <a href="{{ route('admin.library.edit', $item) }}" class="btn btn-sm btn-warning rounded-pill"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.library.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Hapus item ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $items->links('vendor.pagination.custom-admin') }}</div>
@endsection