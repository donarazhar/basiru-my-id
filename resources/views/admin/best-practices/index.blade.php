@extends('layouts.admin')
@section('page-title', 'Kelola Praktik Baik')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Daftar Praktik Baik</h5>
        <p class="text-muted small mb-0">Kelola konten praktik baik terbaik</p>
    </div>
    <a href="{{ route('admin.best-practices.create') }}" class="btn btn-primary rounded-pill px-4">
        <i class="fas fa-plus me-1"></i> Tambah Baru
    </a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th width="130" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($practices as $practice)
                    <tr>
                        <td class="text-muted">{{ $practice->id }}</td>
                        <td>
                            <div class="fw-semibold">{{ Str::limit($practice->title, 50) }}</div>
                        </td>
                        <td class="text-muted">{{ $practice->author ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $practice->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                                <i class="fas fa-{{ $practice->is_active ? 'check' : 'times' }} me-1"></i>
                                {{ $practice->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="small text-muted">{{ $practice->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('admin.best-practices.edit', $practice) }}" class="btn btn-sm btn-warning rounded-pill" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.best-practices.destroy', $practice) }}" class="d-inline" onsubmit="return confirm('Hapus praktik baik ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-pill" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0">Belum ada data praktik baik</p>
                                <a href="{{ route('admin.best-practices.create') }}" class="btn btn-primary btn-sm rounded-pill mt-2">
                                    <i class="fas fa-plus me-1"></i> Tambah Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $practices->links('vendor.pagination.custom-admin') }}</div>
@endsection