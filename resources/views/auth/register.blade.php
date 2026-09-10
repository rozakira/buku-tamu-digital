<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Buku Tamu Digital</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #1d4ed8;
            color: white;
            padding: 18px 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .brand-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            font-size: 14px;
            color: #dbeafe;
        }

        .container {
            min-height: calc(100vh - 76px);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-card {
            width: 100%;
            max-width: 450px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 32px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .card-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .card-title {
            margin: 0 0 8px 0;
            font-size: 25px;
            font-weight: bold;
            color: #111827;
        }

        .card-description {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: #6b7280;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }

        .form-input {
            width: 100%;
            height: 46px;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            color: #111827;
            background: white;
        }

        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .error {
            margin-top: 6px;
            font-size: 13px;
            color: #dc2626;
        }

        .submit-button {
            width: 100%;
            height: 48px;
            margin-top: 5px;
            background: #1d4ed8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-button:hover {
            background: #1e40af;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #2563eb;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #6b7280;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
            }

            .brand-title {
                font-size: 19px;
            }

            .brand-subtitle {
                font-size: 12px;
            }

            .register-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <div class="brand-title">
            Buku Tamu Digital
        </div>

        <div class="brand-subtitle">
            BPS Kota Bukittinggi
        </div>

    </nav>


    <main class="container">

        <div>

            <div class="register-card">

                <div class="card-header">

                    <h1 class="card-title">
                        Register Admin
                    </h1>

                    <p class="card-description">
                        Buat akun untuk mengakses
                        dashboard Buku Tamu Digital.
                    </p>

                </div>


                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    <!-- NAMA -->

                    <div class="form-group">

                        <label
                            for="name"
                            class="form-label"
                        >
                            Nama
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-input"
                            placeholder="Masukkan nama"
                            required
                            autofocus
                            autocomplete="name"
                        >

                        @error('name')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-input"
                            placeholder="Masukkan email"
                            required
                            autocomplete="username"
                        >

                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-input"
                            placeholder="Masukkan password"
                            required
                            autocomplete="new-password"
                        >

                        @error('password')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="form-group">

                        <label
                            for="password_confirmation"
                            class="form-label"
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Ulangi password"
                            required
                            autocomplete="new-password"
                        >

                        @error('password_confirmation')
                            <div class="error">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Daftar Admin
                    </button>

                </form>


                <a
                    href="{{ route('login') }}"
                    class="login-link"
                >
                    Sudah punya akun? Login
                </a>

            </div>


            <div class="footer">
                © {{ date('Y') }} BPS Kota Bukittinggi
            </div>

        </div>

    </main>

</body>
</html>