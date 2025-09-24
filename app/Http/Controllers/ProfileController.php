<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::first();
        return view('admin.profile.index', compact('admin'));
    }

    public function edit(String $id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
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
