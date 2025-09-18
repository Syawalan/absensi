<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        // $users = User::where('id', '!=', 1)->get();
        return view('admin.data_pegawai.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data_pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'tempat_lahir' => 'nullable|string|max:225',
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'required|string|max:40',
            'password' => 'required|min:8',
            'bidang' => 'required|string|max:255'
        ]);

        $fotoPath = null;

        if($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
        }
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'foto' => $fotoPath,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'bidang' => $request->bidang
        ]);

        return redirect()->route('admin.data_pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.data_pegawai.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email' . $user->id,
            'foto' => 'nullable|images|mimes:jpg, jpeg, png|max:2048',
            'tempat_lahir' => 'nullable|string|max:225',
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'required|string|max:40',
            'password' => 'nullable|min:8',
            'bidang' => 'required|string|max:25'
        ]);
        
        if ($request->hasFile('foto')) {
            if($user->foto && Storage::exists($user->foto)){
                Storage::delete($user->foto);
            }

            $fotoPath = $request->file('foto')->store('foto', 'public');
            $user->foto = $fotoPath;
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'foto' => $fotoPath,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'bidang' => $request->bidang
        ]);

        return redirect()->route('admin.data_pegawai.index')->with('success', 'Data pegawai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.data_pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }
}
