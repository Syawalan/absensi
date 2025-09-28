<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
{
    $query = User::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function($q) use ($search) {
            $q->where('username', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('bidang', 'like', "%{$search}%");
        });
    }

    $users = $query->paginate(10);

    return view('admin.data_pegawai.index', ['users' => $users, 'search' => $request->search]);
}


    public function dashboardPegawai()
    {
        $user_id = Session::get('user_id');
        $user = User::findOrFail($user_id);

        $totalHadir = $user->absensi()->where('status', 'hadir')->count();
        $totalIzin = $user->absensi()->where('status', 'izin')->count();
        $totalSakit = $user->absensi()->where('status', 'sakit')->count();
        return view('pegawai.dashboard', compact('user', 'totalHadir', 'totalIzin', 'totalSakit'));
    }

    public function create()
    {
        return view('admin.data_pegawai.create');
    }

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

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.data_pegawai.edit', compact('user'));
    }

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
        
        if ($request->hasFile('foto')){
            if($user->foto && Storage::exists($user->foto)) {
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

    public function destroy(User $user) 
    {
        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->delete();
        return redirect()->route('admin.data_pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }
}
