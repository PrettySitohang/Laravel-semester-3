<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// --- Simulating a Database/User Repository (Konsep Firestore/DB) ---
class UserRepository
{
    // Ini adalah 'database' admin_users yang disimulasikan.
    // Dalam aplikasi Laravel nyata dengan Firestore, Anda akan melakukan query di sini.
    private static $users = [
        ['username' => 'pretty', 'password' => 'Admin1', 'name' => 'Pretty'],
        ['username' => 'mei', 'password' => 'Admin2', 'name' => 'Mei'],
    ];

    public static function findByUsername($username)
    {
        // Mencari pengguna berdasarkan username
        foreach (self::$users as $user) {
            if ($user['username'] === strtolower($username)) {
                return $user;
            }
        }
        return null;
    }
}
// -------------------------------------------------------------------

class AdminLoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login-admin');
    }

    // Proses login (Mengambil data dari UserRepository/Simulasi DB)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // 1. Ambil data admin dari "Database" (Simulasi)
        $user = UserRepository::findByUsername($credentials['username']);

        // 2. Verifikasi kredensial
        // CATATAN PENTING: Dalam aplikasi nyata, Anda HARUS menggunakan Hash::check()
        // setelah menyimpan password yang di-hash (misalnya Hash::make('password'))
        // if ($user && Hash::check($credentials['password'], $user['password'])) {
        if ($user && $credentials['password'] === $user['password']) {

            // Login Berhasil

            // 1. Menyimpan status login
            session(['is_admin_logged_in' => true]);

            // 2. Menyimpan nama admin dari data DB
            session(['admin_username' => $user['name']]); // Menyimpan nama lengkap (Pretty atau Mei)

            // 3. Flash Session
            $request->session()->flash('success', 'Selamat datang kembali, ' . $user['name'] . '!');

            // Regenerasi ID sesi
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        // Login Gagal
        return back()->with('error', 'Username atau password salah')->withInput();
    }

    // Logout (Logika tetap sama)
    public function logout(Request $request)
    {
        $request->session()->forget('is_admin_logged_in');
        $request->session()->forget('admin_username');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // Metode Tambahan untuk Contoh Pengambilan Data
    public function checkSession()
    {
        $isLoggedIn = session('is_admin_logged_in');
        $username = session('admin_username');

        if ($isLoggedIn) {
            return "Admin **{$username}** sedang login. Status: $isLoggedIn";
        } else {
            return "Admin tidak sedang login.";
        }
    }
}
