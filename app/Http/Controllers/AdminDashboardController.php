<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- PROTEKSI MANUAL TANPA MIDDLEWARE ---
        // Cek sesi login admin
        if (!$request->session()->get('is_admin_logged_in')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->route('admin.login');
        }
        // ----------------------------------------

        $stats = [
            'articles' => 120,
            'active_users' => 15,
            'site_traffic' => 1024,
        ];

        $notifications = [
            'Backup data terakhir 2 hari lalu berhasil.',
            'Ada 3 komentar menunggu moderasi.',
            'Sistem update versi 1.2.3 sudah terpasang.',
        ];

        $recentActivities = [
            'Admin A membuat artikel "Teknologi Baru Sawit".',
            'User B mendaftar akun.',
            'Admin C mempublikasikan artikel baru.',
        ];

        // Pastikan view dipanggil dari 'resources/views/dashboard-admin.blade.php'
        return view('dashboard-admin', compact('stats', 'notifications', 'recentActivities'));
    }
}
