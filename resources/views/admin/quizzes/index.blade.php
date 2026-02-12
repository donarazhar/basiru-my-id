@extends('layouts.admin')
@section('page-title', 'Kelola Quiz')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Daftar Quiz</h5>
    <a href="{{ route('admin.quizzes.create') }}" class="btn btn-primary rounded-pill"><i class="fas fa-plus me-1"></i> Tambah</a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Judul</th>
                        <th>Google Form URL</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->title }}</td>
                        <td class="small text-truncate" style="max-width:250px;">{{ $quiz->google_form_url }}</td>
                        <td><span class="badge {{ $quiz->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">{{ $quiz->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td>
                            <a href="{{ route('admin.quizzes.edit', $quiz) }}" class="btn btn-sm btn-warning rounded-pill"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.quizzes.destroy', $quiz) }}" class="d-inline" onsubmit="return confirm('Hapus quiz ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $quizzes->links('vendor.pagination.custom-admin') }}</div>
@endsection