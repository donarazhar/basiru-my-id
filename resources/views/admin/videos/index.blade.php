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
                        <th width="140">Thumbnail</th>
                        <th>Judul</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($videos as $video)
                    @php
                    // Extract video ID from youtube embed URL
                    $videoId = '';
                    if (preg_match('/embed\/([a-zA-Z0-9_\-]+)/', $video->youtube_url, $matches)) {
                    $videoId = $matches[1];
                    }
                    @endphp
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>
                            @if($videoId)
                            <a href="{{ $video->youtube_url }}" target="_blank" title="Tonton video">
                                <img src="https://img.youtube.com/vi/{{ $videoId }}/mqdefault.jpg"
                                    width="120" height="68"
                                    style="object-fit: cover; border-radius: 6px; border: 2px solid #e2e8f0;"
                                    alt="{{ $video->title }}"
                                    onerror="this.src='{{ asset('assets/img/placeholder-gallery.svg') }}'">
                            </a>
                            @else
                            <img src="{{ asset('assets/img/placeholder-gallery.svg') }}" width="120" height="68" style="object-fit: cover; border-radius: 6px;" alt="No thumbnail">
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $video->title }}</div>
                            <small class="text-muted text-truncate d-block" style="max-width: 200px;">{{ $video->youtube_url }}</small>
                        </td>
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