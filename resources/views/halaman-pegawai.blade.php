<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai: {{ $pegawai['employee_name'] }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            background-color: #f0f2f5;
            color: #333;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header h2 {
            margin: 0;
            font-weight: 400;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 25px;
            font-size: 1.8em;
        }
        .data-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .data-card {
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .data-card strong {
            display: block;
            color: #555;
            margin-bottom: 5px;
            font-size: 0.9em;
            text-transform: uppercase;
        }
        .skills-list {
            list-style-type: none;
            padding-left: 0;
            margin-top: 5px;
        }
        .skills-list li {
            background: #e9ecef;
            margin-bottom: 5px;
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            font-size: 0.9em;
        }
        .status-box {
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            font-size: 1.1em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .status-new {
            background-color: #ffc107;
            color: #333;
        }
        .status-senior {
            background-color: #28a745;
            color: white;
        }
        .career-goal-box {
            grid-column: 1 / 3;
            padding: 20px;
            background-color: #e6f7ff;
            border: 1px solid #b3e0ff;
            border-radius: 8px;
            margin-top: 10px;
        }
        .career-goal-box strong {
            color: #0056b3;
        }
        .footer {
            background-color: #343a40;
            color: #ccc;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            font-size: 0.85em;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <header class="header">
        <h2>Sistem Informasi Kepegawaian (SIK)</h2>
        <p>Data Profil Karyawan</p>
    </header>

    <div class="container">
        <h1>Profil Pegawai</h1>

        <div class="data-grid">
            {{-- Nama Pegawai --}}
            <div class="data-card">
                <strong>Nama Pegawai</strong>
                {{ $pegawai['employee_name'] }}
            </div>

            {{-- Jabatan --}}
            <div class="data-card">
                <strong>Jabatan</strong>
                {{ $pegawai['position'] }}
            </div>

            {{-- Usia --}}
            <div class="data-card">
                <strong>Usia</strong>
                {{ $pegawai['age'] }} tahun
            </div>

            {{-- Gaji Bulanan --}}
            <div class="data-card">
                <strong>Gaji Bulanan</strong>
                Rp{{ number_format($pegawai['salary'], 0, ',', '.') }}
            </div>

            {{-- Tanggal Mulai Kerja --}}
            <div class="data-card">
                <strong>Tanggal Mulai Kerja</strong>
                {{ $pegawai['join_date'] }}
            </div>

            {{-- Lama Bekerja --}}
            <div class="data-card">
                <strong>Lama Bekerja</strong>
                {{ $pegawai['working_duration'] }} hari
            </div>

            {{-- Keahlian --}}
            <div class="data-card" style="grid-column: 1 / 3;">
                <strong>Keahlian (Skills)</strong>
                <ul class="skills-list">
                    @foreach ($pegawai['skills'] as $skill)
                        <li>{{ $skill }}</li>
                    @endforeach
                </ul>
            </div>

            {{-- Status Pegawai (dengan logika IF) --}}
            <div class="status-box @if ($pegawai['working_duration'] < 730) status-new @else status-senior @endif" style="grid-column: 1 / 3;">
                {{ $pegawai['status_pegawai'] }}
            </div>

            {{-- Cita-cita Karir --}}
            <div class="career-goal-box">
                <strong>Cita-cita :</strong>
                <p>{{ $pegawai['career_goal'] }}</p>
            </div>
        </div>

    </div>

    {{-- FOOTER --}}
    <footer class="footer">
        &copy; {{ date('Y') }} - {{ $pegawai['employee_name'] }} | Tugas Framework IT - Informatika
    </footer>

</body>
</html>
