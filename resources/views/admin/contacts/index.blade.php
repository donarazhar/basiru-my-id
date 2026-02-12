@extends('layouts.admin')
@section('page-title', 'Pesan Masuk')

@section('content')
<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                        <td>{{ $contact->id }}</td>
                        <td class="fw-bold">{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->message, 40) }}</td>
                        <td class="small text-muted">{{ $contact->created_at->format('d M Y H:i') }}</td>
                        <td>
                            @if($contact->is_read)
                            <span class="badge bg-success rounded-pill">Dibaca</span>
                            @else
                            <span class="badge bg-warning rounded-pill">Baru</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info rounded-pill text-white"><i class="fas fa-eye"></i></a>
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-pill"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada pesan masuk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $contacts->links('vendor.pagination.custom-admin') }}</div>
@endsection