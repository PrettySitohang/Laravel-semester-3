<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; // Anda mungkin perlu ini untuk beberapa kasus, tapi helper 'redirect()' sudah cukup.

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['username']      = 'Pretty Sitohang';
        $data ['last_login']    = date('Y-m-d H:i:s');
        $data ['list_pendidikan'] = ['SD','SMP','SMA','S1','S2','S3'];
        return view('simple-home', $data );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function signup(Request $request)
    {
    //dd($request->all());
        {
            $request->validate([
                'name'  => 'required|max:10',
                'email' => ['required','email'],
                'password' => [
                    'required',        // Wajib diisi
                    'string',          // Harus berupa string
                    'min:8',           // Minimal 8 karakter
                    'regex:/[a-z]/',   // Harus mengandung setidaknya 1 huruf kecil
                    'regex:/[A-Z]/',   // Harus mengandung setidaknya 1 huruf besar
                    'regex:/[0-9]/',   // Harus mengandung setidaknya 1 angka
                ],
            ]);

        }

        $pageData['name']    = $request->name;
        $pageData['email']   = $request->email;
        $pageData['password'] = $request->password;
        return view('signup-success', $pageData);
    }

    /**
     * Mengarahkan (redirect) pengguna berdasarkan parameter yang diberikan.
     *
     * @param string $page Pilihan 'login' atau 'belanja'.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectTo(string $page)
    {
        if ($page === 'login') {
            // Mengarahkan ke rute yang dinamai 'login'
            // Asumsi: Anda memiliki rute yang dinamai 'login' untuk halaman otentikasi
            return redirect()->route('login');
        } elseif ($page === 'belanja') {
            // Mengarahkan ke URL eksternal E-Commerce
            return redirect()->to('https://www.tokopedia.com/'); // Contoh URL E-Commerce
        }

        // Opsional: Jika parameter tidak sesuai, kembali ke halaman utama atau berikan pesan error.
        return redirect('/');
    }

}
