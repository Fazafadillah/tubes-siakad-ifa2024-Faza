<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );
        // return view('pages.dashboard');


        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // if(Auth::attempt($infoLogin)){
        //     // echo 'sukses';
        //     return view('pages.dashboard');
        // }
        // else{
        //     // echo 'usename dan password salah';
        //     return redirect('')->withErrors('Username dan password tidak sesuai')->withInput();
        // }

        if (Auth::attempt($infoLogin)) {

            if (Auth::user()->role == 'Mahasiswa') {
                // return redirect('admin/operator');
                return redirect('dashboard');
            } elseif (Auth::user()->role == 'Admin') {
                // return redirect('admin/operator');
                return redirect('dashboard');
            }
        } else {
            return redirect('')->withErrors('Email dan password tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
