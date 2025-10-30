<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Facade Session sudah ada

class AuthController extends Controller
{
    public function index()
    {
        return view('login-form');
    }

    public function login(Request $request)
    {
        // 1. Validasi Input Login
        $request->validate([
            'username' => 'required',
            'password' => ['required', 'min:3', 'regex:/[A-Z]/'],
        ],[
            'password.min' => 'Password harus terdiri dari minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kapital.',
        ]);

        // 2. Logika Otentikasi
        $nim = 'M455301233';

        if ($request->username === $nim && $request->password === $nim){
            // Login Berhasil: Set Session dan Redirect
            $username = $request->username;
            Session::put('username', $username);

            return redirect('/home')->with('success', 'Login berhasil! Selamat Datang, ' .
             $username . '.');
        } else {
            // Login Gagal
            return back()->withErrors([
                'auth_failed' => 'Username atau password tidak sesuai.'
            ])->withInput();
        }
    }

    // ====================================================================
    // PERBAIKAN: MENAMBAHKAN METHOD REGISTRASI YANG HILANG
    // ====================================================================

    /**
     * Menampilkan form registrasi.
     */
    public function registerForm()
    {
        // Method ini dipanggil oleh Route::get('/auth/register')
        return view('register-form');
    }

    /**
     * Memproses permintaan registrasi.
     */
    public function register(Request $request)
    {
        // Method ini dipanggil oleh Route::post('/auth/register')

        // 1. Validasi Inputan Registrasi
        $request->validate([
            'nama' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'], //Nama tanpa angka
            'alamat' => 'required|string|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required|string|min:4',
            'password' => ['required', 'string', 'min:6', 'regex:/[A-Z]/',
            'regex:/[0-9]/'], // Kapital & Angka
        ], [
            'nama.regex' => 'Nama tidak boleh mengandung angka atau simbol.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kapital dan satu angka.',
        ]);

        // 2. Cek Kesamaan Password
        if ($request->password !== $request->confirm_password) {
            // Kembali ke form registrasi dengan error
            return back()->with('error', 'Confirm Password tidak sesuai.')->withInput();
        }

        // 3. Proses Registrasi Berhasil (Simulasi)

        // 4. Redirect ke Halaman Login dengan Flash Data Success
        // Menggunakan redirect('/auth') karena itu adalah halaman login
        return redirect('/auth')->with('success', 'Registrasi berhasil! Silahkan Login.');
    }
}
