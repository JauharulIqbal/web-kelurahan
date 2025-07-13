<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriUmkmController extends Controller
{

    public function index(Request $request)
    {
        $query = KategoriUmkm::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }

        $kategoris = $query->withCount('umkm')->latest()->paginate(10);

        return view('admin.kategori-umkm.view-kategori', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori-umkm.add-kategori');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_umkm,nama_kategori',
        ]);

        KategoriUmkm::create($validated);

        return redirect()->route('admin.kategori-umkm.index')->with('success', 'Kategori UMKM berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $kategori = KategoriUmkm::findOrFail($id);
        return view('admin.kategori-umkm.edit-kategori', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $kategori = KategoriUmkm::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_umkm,nama_kategori,' . $id . ',id_kategori',
        ]);

        $kategori->update($validated);

        return redirect()->route('admin.kategori-umkm.index')->with('success', 'Kategori UMKM berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $kategori = KategoriUmkm::findOrFail($id);
        
        // Cek apakah kategori masih digunakan oleh UMKM
        if ($kategori->umkm()->exists()) {
            return redirect()->route('admin.kategori-umkm.index')->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh UMKM.');
        }

        $kategori->delete();

        return redirect()->route('admin.kategori-umkm.index')->with('success', 'Kategori UMKM berhasil dihapus.');
    }
}
