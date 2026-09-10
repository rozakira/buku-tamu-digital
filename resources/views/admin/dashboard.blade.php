<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Buku Tamu Digital</title>

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

        /* NAVBAR */
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

        .admin-area {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .admin-name {
            font-size: 14px;
            font-weight: 600;
        }

        .logout-button {
            background: white;
            color: #1d4ed8;
            border: none;
            padding: 9px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #eff6ff;
        }

        /* MAIN */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin: 0 0 8px 0;
            color: #111827;
        }

        .page-description {
            margin: 0 0 28px 0;
            color: #6b7280;
            font-size: 15px;
        }

        /* STAT CARDS */
        .stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 34px;
            font-weight: bold;
            color: #1d4ed8;
        }

        /* SOURCE */
        .source-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 19px;
            font-weight: bold;
            color: #111827;
            margin: 0 0 20px 0;
        }

        .source-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .source-item {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 18px;
            background: #f9fafb;
        }

        .source-name {
            font-size: 14px;
            color: #4b5563;
            margin-bottom: 8px;
        }

        .source-number {
            font-size: 25px;
            font-weight: bold;
            color: #111827;
        }

        /* ACTION */
        .action-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .action-button {
            display: inline-block;
            background: #1d4ed8;
            color: white;
            padding: 11px 20px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .action-button:hover {
            background: #1e40af;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                padding: 25px 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .source-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .admin-name {
                display: none;
            }
        }

        @media (max-width: 480px) {

            .source-grid {
                grid-template-columns: 1fr;
            }

            .brand-title {
                font-size: 18px;
            }

            .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div>
            <div class="brand-title">
                Buku Tamu Digital
            </div>

            <div class="brand-subtitle">
                BPS Kota Bukittinggi
            </div>
        </div>

        <div class="admin-area">

            <span class="admin-name">
                {{ auth()->user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Logout
                </button>
            </form>

        </div>

    </nav>


    <!-- CONTENT -->
    <main class="container">

        <h1 class="page-title">
            Dashboard
        </h1>

        <p class="page-description">
            Ringkasan data Buku Tamu Digital BPS Kota Bukittinggi
        </p>


        <!-- STATISTIK -->
        <div class="stats">

            <!-- Total Tamu -->
            <div class="stat-card">

                <div class="stat-label">
                    Total Tamu
                </div>

                <div class="stat-number">
                    {{ $totalGuests }}
                </div>

            </div>


            <!-- Tamu Bulan Ini -->
            <div class="stat-card">

                <div class="stat-label">
                    Tamu Bulan Ini
                </div>

                <div class="stat-number">
                    {{ $guestsThisMonth }}
                </div>

            </div>

        </div>


        <!-- SUMBER KUNJUNGAN -->
        <div class="source-card">

            <h2 class="section-title">
                Sumber Kunjungan
            </h2>

            <div class="source-grid">

                <!-- Direct -->
                <div class="source-item">

                    <div class="source-name">
                        Direct
                    </div>

                    <div class="source-number">
                        {{ $sourceCounts['direct'] }}
                    </div>

                </div>


                <!-- WhatsApp -->
                <div class="source-item">

                    <div class="source-name">
                        WhatsApp
                    </div>

                    <div class="source-number">
                        {{ $sourceCounts['whatsapp'] }}
                    </div>

                </div>


                <!-- Instagram -->
                <div class="source-item">

                    <div class="source-name">
                        Instagram
                    </div>

                    <div class="source-number">
                        {{ $sourceCounts['instagram'] }}
                    </div>

                </div>


                <!-- Facebook -->
                <div class="source-item">

                    <div class="source-name">
                        Facebook
                    </div>

                    <div class="source-number">
                        {{ $sourceCounts['facebook'] }}
                    </div>

                </div>

            </div>

        </div>


        <!-- ACTION -->
        <div class="action-card">

            <h2 class="section-title">
                Data Tamu
            </h2>

            <p style="color: #6b7280; font-size: 14px; margin-bottom: 18px;">
                Lihat seluruh data tamu dan gunakan fitur pencarian berdasarkan nama.
            </p>

            <a
                href="{{ route('admin.guests') }}"
                class="action-button"
            >
                Lihat Daftar Tamu
            </a>

        </div>

    </main>

</body>
</html>