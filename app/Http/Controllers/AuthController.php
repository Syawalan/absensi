<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginform()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)){
            session([
                'role' => 'admin',
                'admin_id' => $admin->id,
                'nama' => $admin->nama_admin
            ]);
            return redirect()->route('admin.dashboard');
        }
        
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'role' => 'pegawai',
                'user_id' => $user->id,
                'nama' => $user->username
            ]);
            return redirect()->route('pegawai.dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.form');
    }
}
