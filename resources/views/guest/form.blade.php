<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buku Tamu Digital - BPS Kota Bukittinggi</title>

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

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #1d4ed8;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .source-badge {
            background: #dbeafe;
            color: #1e40af;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
        }


        /* =========================
           CONTENT
        ========================= */

        .container {
            max-width: 850px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            margin: 0 0 8px 0;
            font-size: 28px;
            font-weight: bold;
            color: #111827;
        }

        .page-description {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
        }


        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .form-title {
            margin: 0 0 6px 0;
            font-size: 20px;
            font-weight: bold;
            color: #111827;
        }

        .form-subtitle {
            margin: 0 0 25px 0;
            font-size: 14px;
            color: #6b7280;
        }


        /* =========================
           SUCCESS
        ========================= */

        .success-message {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 13px 15px;
            margin-bottom: 22px;
            font-size: 14px;
        }


        /* =========================
           FORM INPUT
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 12px 14px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #111827;
            background: white;
            outline: none;
        }

        .form-input {
            height: 46px;
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #9ca3af;
        }


        /* =========================
           ERROR
        ========================= */

        .error-message {
            margin-top: 6px;
            font-size: 13px;
            color: #dc2626;
        }


        /* =========================
           BUTTON
        ========================= */

        .submit-button {
            width: 100%;
            height: 48px;
            background: #1d4ed8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        .submit-button:hover {
            background: #1e40af;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #6b7280;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 650px) {

            .navbar {
                padding: 15px 20px;
            }

            .brand-title {
                font-size: 18px;
            }

            .brand-subtitle {
                font-size: 12px;
            }

            .source-badge {
                font-size: 11px;
                padding: 7px 10px;
            }

            .container {
                padding: 25px 15px;
            }

            .form-card {
                padding: 22px;
            }

            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <div>
            <div class="brand-title">
                Buku Tamu Digital
            </div>

            <div class="brand-subtitle">
                BPS Kota Bukittinggi
            </div>
        </div>

        <div class="source-badge">
            Sumber: {{ $sourceName }}
        </div>

    </nav>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="container">

        <div class="page-header">

            <h1 class="page-title">
                Selamat Datang
            </h1>

            <p class="page-description">
                Silakan mengisi data kunjungan pada Buku Tamu Digital
                BPS Kota Bukittinggi.
            </p>

        </div>


        <!-- FORM -->

        <div class="form-card">

            <h2 class="form-title">
                Form Data Tamu
            </h2>

            <p class="form-subtitle">
                Mohon lengkapi data berikut dengan benar.
                Kolom bertanda <span class="required">*</span> wajib diisi.
            </p>


            <!-- SUCCESS -->

            @if (session('success'))

                <div class="success-message">
                    {{ session('success') }}
                </div>

            @endif


            <form
                method="POST"
                action="{{ route('guest.store') }}"
            >

                @csrf


                <!-- SOURCE -->

                <input
                    type="hidden"
                    name="source"
                    value="{{ $source }}"
                >


                <!-- NAMA -->

                <div class="form-group">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Nama Lengkap
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-input"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                    @error('name')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- NOMOR HP -->

                <div class="form-group">

                    <label
                        for="phone"
                        class="form-label"
                    >
                        Nomor HP
                        <span class="required">*</span>
                    </label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="form-input"
                        placeholder="Contoh: 08123456789"
                        required
                    >

                    @error('phone')
                        <div class="error-message">
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
                        <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-input"
                        placeholder="Contoh: nama@email.com"
                        required
                    >

                    @error('email')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- INSTANSI -->

                <div class="form-group">

                    <label
                        for="institution"
                        class="form-label"
                    >
                        Instansi / Asal
                    </label>

                    <input
                        type="text"
                        id="institution"
                        name="institution"
                        value="{{ old('institution') }}"
                        class="form-input"
                        placeholder="Nama instansi atau asal"
                    >

                    @error('institution')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- KEPERLUAN -->

                <div class="form-group">

                    <label
                        for="purpose"
                        class="form-label"
                    >
                        Keperluan
                    </label>

                    <textarea
                        id="purpose"
                        name="purpose"
                        class="form-textarea"
                        placeholder="Tuliskan keperluan kunjungan"
                    >{{ old('purpose') }}</textarea>

                    @error('purpose')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- TANGGAL -->

                <div class="form-group">

                    <label
                        for="visit_date"
                        class="form-label"
                    >
                        Tanggal Kunjungan
                        <span class="required">*</span>
                    </label>

                    <input
                        type="date"
                        id="visit_date"
                        name="visit_date"
                        value="{{ old('visit_date', date('Y-m-d')) }}"
                        class="form-input"
                        required
                    >

                    @error('visit_date')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- SUBMIT -->

                <button
                    type="submit"
                    class="submit-button"
                >
                    Kirim Data Tamu
                </button>

                <button
    type="button"
    onclick="history.back()"
    style="
        width: 100%;
        height: 44px;
        margin-top: 10px;
        background: white;
        color: #1d4ed8;
        border: 1px solid #1d4ed8;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    "
>
    ← Kembali
</button>

            </form>

        </div>


        <!-- FOOTER -->

        <div class="footer">
            © {{ date('Y') }} BPS Kota Bukittinggi
        </div>

    </main>

</body>
</html>