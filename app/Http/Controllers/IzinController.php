<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function create()
    {
        return view('pegawai.izin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:izin,sakit',
            'alasan' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran_izin', 'public');
        }

        Izin::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'alasan' => $request->alasan,
            'lampiran' => $path ?? null,
        ]);

        return redirect()->back()->with('success', 'Pengajuan izin/sakit berhasil!');
    }
    public function updateStatus(Request $request, $id) {
        $izin = Izin::findOrFail($id);
        $izin->update([
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Status izin diperbarui   ']);
    }
}
