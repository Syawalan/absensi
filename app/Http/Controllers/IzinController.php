<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:izin,sakit',
            'alasan' => 'required|string',
        ]);

        Izin::create([
            'user_id' => Auth::user(),
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'alasan' => $request->alasan,
            'lampiran' => $request->lampiran ?? null,
        ]);

        return response()->json(['success' => 'Pengajuan izin/sakit berhasil']);
    }

    public function updateStatus(Request $request, $id) {
        $izin = Izin::findOrFail($id);
        $izin->update([
            'status' => $request->status,
        ]);

        return response()->json(['success' => 'Status izin diperbarui   ']);
    }
}
