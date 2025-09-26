<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    /**
     * Menampilkan data pegawai dengan ketentuan yang diminta.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- Data Pegawai ---
        $date_of_birth = Carbon::createFromDate(2006, 5, 24);
        $join_date = Carbon::createFromDate(2023, 1, 15);
        $current_date = Carbon::now();

        // --- Perhitungan yang Diminta ---

        // Usia dalam bilangan bulat (integer)
        $age = (int) $date_of_birth->diffInYears($current_date);

        // Lama bekerja dalam HARI (integer) - DIBULATKAN ULANG DENGAN (int)
        $working_duration_float = $join_date->diffInDays($current_date);
        $working_duration = (int) $working_duration_float; // Pastikan hasilnya integer

        // 3. Tentukan Status Pegawai (menggunakan nilai integer yang sudah bersih)
        $status_pegawai = '';
        if ($working_duration < 730) {
            $status_pegawai = 'Masih pegawai baru, tingkatkan pengalaman kerja! 🚀';
        } else {
            $status_pegawai = 'Sudah senior, jadilah teladan bagi rekan kerja! ✨';
        }

        // --- Susun Data Pegawai ---
        $pegawai = [
            'employee_name'    => 'Pretti Meysari Br. Sitohang',
            'age'              => $age,
            'position'         => 'Full-stack Developer',
            'skills'           => [
                'PHP (Laravel)',
                'JavaScript (Vue.js/React)',
                'Database Management (SQL)',
                'Git Version Control',
                'Cloud Services (AWS/Azure)'
            ],
            'join_date'        => $join_date->isoFormat('D MMMM YYYY'),
            'working_duration' => $working_duration, // Sekarang dijamin integer
            'salary'           => 12000000,
            'status_pegawai'   => $status_pegawai,
            'career_goal'      => 'Keliling Duniaaa ( Swiss yang pertama!! )'
        ];

        return view('halaman-pegawai', compact('pegawai'));
    }
}
