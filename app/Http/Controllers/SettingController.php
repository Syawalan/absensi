<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class SettingController extends Controller
{
    public function index() 
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function create()
    {
        return view('admin.setting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kantor' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius_meter' => 'required|integer|max:100'
        ]);

        Setting::create([
            'nama_kantor' => $request->nama_kantor,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'radius_meter' => $request->radius_meter
        ]);

        return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil disimpan');
    }

    public function edit(String $id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'nama_kantor' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius_meter' => 'required|integer|max:100'
        ]);

        $setting->update($request->all());

        return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil di update');
    }
}
