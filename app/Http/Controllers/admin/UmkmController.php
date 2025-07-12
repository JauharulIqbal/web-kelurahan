<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::latest()->get();
        return view('admin.umkm.index', compact('umkm'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'required',
            // Tambah validasi lain sesuai kebutuhan
        ]);

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'required',
        ]);

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil diupdate.');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil dihapus.');
    }
}
