<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminRegistrationController extends Controller
{
    // Tampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('register-admin');
    }

    // Proses registrasi (Logika penyimpanan konseptual)
    public function register(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // Catatan: 'unique:admin_users' adalah placeholder untuk tabel database
            'username' => ['required', 'string', 'max:255', 'unique:admin_users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // --- Logika Penyimpanan Data ke Database di sini (konseptual) ---
        // Dalam aplikasi nyata, Anda akan menyimpan data ini ke DB/Firestore.

        // Setelah registrasi sukses, arahkan ke halaman login dengan pesan sukses
        return redirect()->route('admin.login')->with('success', 'Registrasi admin berhasil! Silakan login menggunakan kredensial Anda.');
    }
}
