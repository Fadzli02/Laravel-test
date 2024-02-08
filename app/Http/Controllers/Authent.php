<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authent extends Controller
{

    public function register()
    {
        $data = [
            'username' => request('name'),
            'namaLengkap' => request('namaLengkap'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ];

        // dd($data);

        User::create($data);

        session()->flash('berhasil', 'Silahkan Login');
        return redirect('/login');
    }

    public function login()
    {
        $user = User::where('username', request('name'))->first();

        // bisa Juga pake !$user
        if (is_null($user)) {
            session()->flash('Gagal', 'Username atau Password Salah');
            return redirect('/welcome');
        };

        $data = [
            'username' => request('name'),
            'password' => request('pass')
        ];

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect('/login');
        } else {
            session()->flash('Gagal', 'Username atau Password Salah');
            return redirect('/register');
        }

        // session()->flash('Gagal', 'Username atau Password Salah');
        // return redirect('/register');
    }

    public function keluar()
    {
        Auth::logout();
        return redirect('/login');
    }
}
