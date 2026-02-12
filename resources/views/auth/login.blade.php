<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - BASIRU Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #1abc9c 0%, #2c3e50 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            max-width: 420px;
            width: 100%;
            backdrop-filter: blur(10px);
        }

        .login-card h3 {
            color: #2c3e50;
            font-weight: 700;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 2px solid #e9ecef;
        }

        .form-control:focus {
            border-color: #1abc9c;
            box-shadow: 0 0 0 0.2rem rgba(26, 188, 156, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #1abc9c, #16a085);
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #16a085, #138d75);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(26, 188, 156, 0.4);
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <h3>BASIRU</h3>
            <p class="text-muted">Admin Panel</p>
        </div>

        @if($errors->any())
        <div class="alert alert-danger" style="border-radius: 10px;">
            @foreach($errors->all() as $error)
            <p class="mb-0"><small>{{ $error }}</small></p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-muted small fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@basiru.my.id">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-muted small fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="••••••••">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label small text-muted" for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-login w-100">Masuk</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="text-muted small text-decoration-none">← Kembali ke Beranda</a>
        </div>
    </div>
</body>

</html>