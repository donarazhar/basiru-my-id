@extends('layouts.admin')
@section('page-title', 'Kelola Video')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Daftar Video</h5>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus me-1"></i> Tambah Video</a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Judul</th>
                        <th>URL</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td class="small text-truncate" style="max-width:200px;">{{ $video->youtube_url }}</td>
                        <td>{{ $video->order }}</td>
                        <td><span class="badge {{ $video->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">{{ $video->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td>
                            <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-sm btn-warning rounded-pill"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.videos.destroy', $video) }}" class="d-inline" onsubmit="return confirm('Hapus video ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data video</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $videos->links('vendor.pagination.custom-admin') }}</div>
@endsection