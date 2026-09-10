<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Tamu - Buku Tamu Digital</title>

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


        /* =========================
           CONTENT
        ========================= */

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            margin: 0 0 7px 0;
            color: #111827;
        }

        .page-description {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
        }

        .back-button {
            display: inline-block;
            background: #1d4ed8;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .back-button:hover {
            background: #1e40af;
        }


        /* =========================
           SEARCH
        ========================= */

        .search-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            color: #111827;
            outline: none;
        }

        .search-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
        }

        .search-button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .search-button:hover {
            background: #1d4ed8;
        }

        .reset-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #e5e7eb;
            color: #374151;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .reset-button:hover {
            background: #d1d5db;
        }


        /* =========================
           TABLE
        ========================= */

        .table-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        thead {
            background: #eff6ff;
        }

        th {
            padding: 16px 14px;
            text-align: left;
            font-size: 12px;
            font-weight: bold;
            color: #1e3a8a;
            text-transform: uppercase;
            border-bottom: 1px solid #dbeafe;
            white-space: nowrap;
        }

        td {
            padding: 16px 14px;
            font-size: 14px;
            color: #4b5563;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .number {
            color: #6b7280;
            width: 50px;
        }

        .guest-name {
            font-weight: bold;
            color: #111827;
        }

        .date {
            white-space: nowrap;
        }


        /* =========================
           SOURCE BADGE
        ========================= */

        .badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge-direct {
            background: #f3f4f6;
            color: #374151;
        }

        .badge-whatsapp {
            background: #dcfce7;
            color: #166534;
        }

        .badge-instagram {
            background: #fce7f3;
            color: #9d174d;
        }

        .badge-facebook {
            background: #dbeafe;
            color: #1e40af;
        }


        /* =========================
           EMPTY DATA
        ========================= */

        .empty-data {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================
           PAGINATION
        ========================= */

        .pagination-wrapper {
            padding: 18px 20px;
            border-top: 1px solid #e5e7eb;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                padding: 25px 15px;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-form {
                flex-direction: column;
            }

            .search-button,
            .reset-button {
                width: 100%;
                text-align: center;
            }

            .admin-name {
                display: none;
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


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="container">

        <!-- Header -->

        <div class="page-header">

            <div>
                <h1 class="page-title">
                    Daftar Tamu
                </h1>

                <p class="page-description">
                    Data seluruh pengunjung Buku Tamu Digital.
                </p>
            </div>

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-button"
            >
                ← Kembali ke Dashboard
            </a>

        </div>


        <!-- =========================
             SEARCH
        ========================= -->

        <div class="search-card">

            <form
                method="GET"
                action="{{ route('admin.guests') }}"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    class="search-input"
                    placeholder="Cari berdasarkan nama tamu..."
                >

                <button
                    type="submit"
                    class="search-button"
                >
                    🔍 Cari
                </button>

                @if($search)

                    <a
                        href="{{ route('admin.guests') }}"
                        class="reset-button"
                    >
                        Reset
                    </a>

                @endif

            </form>

        </div>


        <!-- =========================
             TABLE
        ========================= -->

        <div class="table-card">

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. HP</th>
                            <th>Email</th>
                            <th>Instansi / Asal</th>
                            <th>Keperluan</th>
                            <th>Tanggal</th>
                            <th>Sumber</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($guests as $guest)

                            <tr>

                                <td class="number">
                                    {{ $guests->firstItem() + $loop->index }}
                                </td>

                                <td class="guest-name">
                                    {{ $guest->name }}
                                </td>

                                <td>
                                    {{ $guest->phone }}
                                </td>

                                <td>
                                    {{ $guest->email }}
                                </td>

                                <td>
                                    {{ $guest->institution ?? '-' }}
                                </td>

                                <td>
                                    {{ $guest->purpose ?? '-' }}
                                </td>

                                <td class="date">
                                    {{ $guest->visit_date->format('d-m-Y') }}
                                </td>

                                <td>

                                    @if($guest->source === 'whatsapp')

                                        <span class="badge badge-whatsapp">
                                            WhatsApp
                                        </span>

                                    @elseif($guest->source === 'instagram')

                                        <span class="badge badge-instagram">
                                            Instagram
                                        </span>

                                    @elseif($guest->source === 'facebook')

                                        <span class="badge badge-facebook">
                                            Facebook
                                        </span>

                                    @else

                                        <span class="badge badge-direct">
                                            Direct
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="empty-data"
                                >

                                    @if($search)

                                        Tidak ditemukan tamu dengan nama
                                        "{{ $search }}".

                                    @else

                                        Belum ada data tamu.

                                    @endif

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- Pagination -->

            @if($guests->hasPages())

                <div class="pagination-wrapper">
                    {{ $guests->links() }}
                </div>

            @endif

        </div>

    </main>

</body>
</html>