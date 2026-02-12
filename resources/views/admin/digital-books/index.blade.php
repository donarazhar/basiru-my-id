@extends('layouts.admin')
@section('page-title', 'Kelola Buku Digital')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Daftar Buku Digital</h5>
    <a href="{{ route('admin.digital-books.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus me-1"></i> Tambah</a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>File</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ Str::limit($book->title, 40) }}</td>
                        <td>{{ $book->author ?? '-' }}</td>
                        <td><a href="{{ asset('storage/' . $book->file_path) }}" target="_blank" class="text-primary"><i class="fas fa-file-pdf me-1"></i> PDF</a></td>
                        <td><span class="badge {{ $book->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">{{ $book->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td>
                            <a href="{{ route('admin.digital-books.edit', $book) }}" class="btn btn-sm btn-warning rounded-pill"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.digital-books.destroy', $book) }}" class="d-inline" onsubmit="return confirm('Hapus buku ini?')">
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
<div class="mt-3">{{ $books->links('vendor.pagination.custom-admin') }}</div>
@endsection