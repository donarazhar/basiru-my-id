@extends('layouts.admin')
@section('page-title', 'Profil Saya')

@section('styles')
.profile-photo-wrapper {
position: relative;
width: 140px;
height: 140px;
margin: 0 auto 1rem;
}

.profile-photo {
width: 140px;
height: 140px;
border-radius: 50%;
object-fit: cover;
border: 4px solid #e2e8f0;
box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
transition: var(--transition);
}

.profile-photo-placeholder {
width: 140px;
height: 140px;
border-radius: 50%;
background: linear-gradient(135deg, var(--primary), var(--accent));
display: flex;
align-items: center;
justify-content: center;
font-size: 3.5rem;
font-weight: 800;
color: #fff;
border: 4px solid #e2e8f0;
box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.photo-upload-label {
position: absolute;
bottom: 4px;
right: 4px;
width: 38px;
height: 38px;
border-radius: 50%;
background: linear-gradient(135deg, var(--primary), var(--primary-dark));
color: #fff;
display: flex;
align-items: center;
justify-content: center;
cursor: pointer;
box-shadow: 0 3px 10px rgba(26, 188, 156, 0.4);
transition: var(--transition);
border: 3px solid #fff;
}

.photo-upload-label:hover {
transform: scale(1.1);
box-shadow: 0 5px 15px rgba(26, 188, 156, 0.5);
}

.section-icon {
width: 42px;
height: 42px;
border-radius: 12px;
display: inline-flex;
align-items: center;
justify-content: center;
font-size: 1rem;
color: #fff;
flex-shrink: 0;
}

.password-toggle {
cursor: pointer;
color: #94a3b8;
transition: var(--transition);
}

.password-toggle:hover {
color: var(--primary);
}

.photo-preview-area {
text-align: center;
padding: 2rem 1rem;
background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
border-radius: var(--radius);
border: 2px dashed #e2e8f0;
margin-bottom: 1rem;
transition: var(--transition);
}

.photo-preview-area:hover {
border-color: var(--primary-light);
background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
}
@endsection

@section('content')
<div class="row g-4">
    {{-- ================================
         LEFT COLUMN: PHOTO
    ================================= --}}
    <div class="col-lg-4">
        <div class="card admin-card">
            <div class="card-body p-4">
                <div class="photo-preview-area">
                    <div class="profile-photo-wrapper">
                        @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="profile-photo" id="photoPreview">
                        @else
                        <div class="profile-photo-placeholder" id="photoPlaceholder">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <img src="#" alt="Foto Profil" class="profile-photo d-none" id="photoPreview">
                        @endif

                        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" id="photoForm">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="name" value="{{ $user->name }}">
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <label for="photoInput" class="photo-upload-label" title="Ganti Foto">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" name="photo" id="photoInput" class="d-none" accept="image/jpeg,image/png,image/webp">
                        </form>
                    </div>

                    <h5 class="fw-bold mb-1 mt-3">{{ $user->name }}</h5>
                    <p class="text-muted mb-0" style="font-size: 0.85rem;">{{ $user->email }}</p>
                </div>

                @if($user->photo)
                <div class="text-center mt-3">
                    <form method="POST" action="{{ route('admin.profile.delete-photo') }}" onsubmit="return confirm('Hapus foto profil?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                            <i class="fas fa-trash-alt me-1"></i> Hapus Foto
                        </button>
                    </form>
                </div>
                @endif

                <div class="text-center mt-3">
                    <small class="text-muted">JPG, PNG, atau WebP. Maks 2MB</small>
                </div>
            </div>
        </div>
    </div>

    {{-- ================================
         RIGHT COLUMN: INFO & PASSWORD
    ================================= --}}
    <div class="col-lg-8">
        {{-- Section: Account Info --}}
        <div class="card admin-card mb-4">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Informasi Akun</h6>
                        <small class="text-muted">Ubah nama dan email Anda</small>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                <input type="text" name="name" id="name" class="form-control border-start-0 @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>
                            @error('name')
                            <div class="text-danger mt-1" style="font-size:0.8rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control border-start-0 @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            @error('email')
                            <div class="text-danger mt-1" style="font-size:0.8rem;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Section: Change Password --}}
        <div class="card admin-card">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Ubah Password</h6>
                        <small class="text-muted">Pastikan menggunakan password yang kuat</small>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.profile.password') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-bold">Password Saat Ini <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-muted"></i></span>
                            <input type="password" name="current_password" id="current_password"
                                class="form-control border-start-0 @error('current_password') is-invalid @enderror" required>
                            <span class="input-group-text bg-light password-toggle" onclick="togglePassword('current_password', this)">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('current_password')
                        <div class="text-danger mt-1" style="font-size:0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-bold">Password Baru <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password" id="password"
                                    class="form-control border-start-0 @error('password') is-invalid @enderror" required>
                                <span class="input-group-text bg-light password-toggle" onclick="togglePassword('password', this)">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            @error('password')
                            <div class="text-danger mt-1" style="font-size:0.8rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-start-0" required>
                                <span class="input-group-text bg-light password-toggle" onclick="togglePassword('password_confirmation', this)">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" class="btn btn-warning rounded-pill px-4 text-white">
                            <i class="fas fa-key me-2"></i> Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-submit photo when selected
    document.getElementById('photoInput').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            // Preview
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('photoPreview');
                const placeholder = document.getElementById('photoPlaceholder');
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                if (placeholder) placeholder.classList.add('d-none');
            };
            reader.readAsDataURL(this.files[0]);

            // Submit
            document.getElementById('photoForm').submit();
        }
    });

    // Toggle password visibility
    function togglePassword(inputId, toggleEl) {
        const input = document.getElementById(inputId);
        const icon = toggleEl.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection