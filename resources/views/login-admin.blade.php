<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - Teknologi Sawit</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff9f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            /* Menggunakan placeholder untuk memastikan kode berjalan */
            background: url('https://png.pngtree.com/thumb_back/fh260/background/20240522/pngtree-aerial-view-oil-palm-estate-in-evening-image_15690592.jpg') no-repeat center center/cover;
            opacity: 0.2;
            z-index: 0;
        }
    .container {
        position: relative;
        display: flex;
        width: 800px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-radius: 12px;
        overflow: hidden;
        background-color: #ffffff; /* Ubah dari rgba(255, 255, 255, 0.9) ke putih solid */
        z-index: 1;
    }

        .left-panel {
            background-color: #FF9900;
            color: white;
            width: 40%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .left-panel h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .left-panel p {
            font-size: 1.1rem;
            max-width: 280px;
            text-align: center;
            line-height: 1.5;
        }
        .right-panel {
            background: white;
            width: 60%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-panel h2 {
            margin-bottom: 25px;
            color: #FF9900;
            font-weight: 700;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="password"] {
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 2px solid #FF9900;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #cc7a00;
            outline: none;
        }
        button {
            background-color: #FF9900;
            border: none;
            color: white;
            padding: 15px;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
            margin-bottom: 15px; /* Tambahkan margin-bottom untuk memberi ruang pada teks Registrasi */
        }
        button:hover {
            background-color: #cc7a00;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
            font-weight: 600;
        }
        .forgot-password {
            text-align: right;
            margin-bottom: 15px;
        }
        .forgot-password a {
            color: #FF9900;
            text-decoration: none;
            font-weight: 600;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        /* Gaya baru untuk prompt registrasi */
        .register-prompt {
            text-align: center;
            font-size: 0.95rem;
            color: #666;
            margin-top: 10px; /* Tambahkan sedikit ruang di atas */
        }
        .register-prompt a {
            color: #FF9900; /* Warna Oranye */
            text-decoration: underline; /* Bergaris Bawah */
            font-weight: 600;
            transition: color 0.3s;
        }
        .register-prompt a:hover {
            color: #cc7a00;
        }
        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
            }
            .left-panel, .right-panel {
                width: 100%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Selamat Datang!</h1>
            <p>Kelola berita teknologi di bidang sawit dengan mudah dan cepat. Login sebagai admin untuk memulai.</p>
        </div>
        <div class="right-panel">
            <h2>Login Admin</h2>

            @if(session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <div class="forgot-password">
                    <a href="#">Lupa password?</a>
                </div>
                <button type="submit">Login</button>

                <!-- Prompt Registrasi -->
                <div class="register-prompt">
                    Belum punya akun? <a href="{{ route('admin.register.form') }}" target="_blank">registrasi</a> terlebih dahulu.
                </div>
            </form>
        </div>
    </div>
</body>
</html>
