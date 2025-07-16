<?php

namespace App\Http\Controllers\Admin;

use App\Models\Umkm;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_usaha', 'like', '%' . $request->search . '%')
                ->orWhere('pemilik', 'like', '%' . $request->search . '%');
        }

        $umkm = $umkm = $query->with('kategori')->oldest()->paginate(10);

        return view('admin.umkm.view-umkm', compact('umkm'));
    }

    public function create()
    {
        $kategoris = KategoriUmkm::all();
        return view('admin.umkm.add-umkm', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'usia_pemilik' => 'nullable|integer|min:1',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'id_kategori' => 'required|exists:kategori_umkm,id_kategori',
            'awal_mulai_usaha' => 'nullable|date',
            'no_telp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses simpan file foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $kategoris = KategoriUmkm::all();
        return view('admin.umkm.edit-umkm', compact('umkm', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $umkm = Umkm::findOrFail($id);

        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'usia_pemilik' => 'nullable|integer|min:1',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'id_kategori' => 'required|exists:kategori_umkm,id_kategori',
            'awal_mulai_usaha' => 'nullable|date',
            'no_telp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {

            if ($umkm->foto && Storage::disk('public')->exists($umkm->foto)) {
                Storage::disk('public')->delete($umkm->foto);
            }
            
            // Simpan foto baru
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }
        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil dihapus.');
    }

    public function exportPdf()
    {
        $umkm = Umkm::all();
        $pdf = Pdf::loadView('admin.umkm.export-pdf', compact('umkm'));
        return $pdf->download('data_umkm.pdf');
    }
}
