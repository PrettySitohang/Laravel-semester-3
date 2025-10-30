<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .register-card {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: #ffffff;
            max-width: 500px;
        }
        .card-header {
            background-color: #3E97FF; /* Warna biru */
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-primary {
            border-radius: 8px;
            background-color: #3E97FF;
            border: none;
        }
        .btn-primary:hover {
            background-color: #337acc;
        }
        .text-danger small {
            font-size: 0.85em;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card register-card">
                <div class="card-header">
                    <h3>Registrasi Akun Baru</h3>
                    <p>Silahkan isi data diri Anda</p>
                </div>
                <div class="card-body">

                    {{-- 1. ALERT DARI KESALAHAN LOGIKA (Confirm Password tidak sama) --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- 2. ALERT DARI VALIDASI (Error pada field) --}}
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <p class="mb-0">Registrasi gagal. Periksa kembali inputan Anda:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama') }}" placeholder="Contoh: Budi Santoso">
                            @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                            placeholder="Alamat lengkap, maks. 300 karakter">{{ old('alamat') }}</textarea>
                            @error('alamat') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <hr>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                            value="{{ old('username') }}" placeholder="Username unik Anda">
                            @error('username') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            placeholder="Min 6 karakter, harus ada huruf kapital & angka">
                            @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Ulangi Password">
                            {{-- Error untuk confirm password ditangani oleh flash data 'error' di atas --}}
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Sudah punya akun? <a href="{{ url('/auth') }}">Login di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
