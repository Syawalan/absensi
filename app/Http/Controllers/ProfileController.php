<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (session('role') === 'admin') {
            $user = Admin::find(session('admin_id'));
            return view('profile.index', compact('user'));
        } elseif( session('role') === 'pegawai') {
            $user = User::find(session('user_id'));
            return view('profile.index', compact('user'));
        }
    }

    public function edit()
    {
        if (session('role') === 'admin') {
            $user = Admin::find(session('admin_id'));
            return view('profile.edit', compact('user'));
        } elseif( session('role') === 'pegawai') {
            $user = User::find(session('user_id'));
            return view('profile.edit', compact('user'));
        }
    }

    public function update(Request $request, Admin $admin)
    {
        if (session('role') === 'admin') {
            $user = Admin::find(session('admin_id'));

            $request->validate([
                'nama_admin' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:8|confirmed'
            ]);

            $user->update([
                'nama_admin' => $request->nama_admin,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password
            ]);

            session(['nama' => $user->nama_admin]);
            return redirect()->route('profile.index');
        }

        if (session('role') === 'pegawai') {
            $user = User::find(session('user_id'));

            $request->validate([
                'username' => 'required|string|max: 255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:8|confirmed'
            ]);

            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password
            ]);

            session(['nama' => $user->username]);
            return redirect()->route('profile.index');
        }



        // $admin = Auth::guard('admin')->user();
        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|min:6|confirmed'
        ]);

        $admin->nama_admin = $request->nama_admin;
        $admin->email = $request->email;

        $admin->update([
            'nama_admin' => $request->nama_admin,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password): $request->password,
        ]);
        return redirect()->route('admin.profile.index');

    }
}
