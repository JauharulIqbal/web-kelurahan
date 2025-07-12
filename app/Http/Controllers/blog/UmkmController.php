<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;

class UmkmController extends Controller
{
    public function index()
    {
        return view('blogpages.umkm.index');
    }

    public function jasa()
    {
        $umkm = Umkm::where('kategori', 'Jasa')->get();
        return view('blogpages.umkm.jasa', compact('umkm'));
    }

    public function makanan()
    {
        $umkm = Umkm::where('kategori', 'Makanan')->get();
        return view('blogpages.umkm.jasa', compact('umkm'));
    }

    public function minuman()
    {
        $umkm = Umkm::where('kategori', 'Minuman')->get();
        return view('blogpages.umkm.jasa', compact('umkm'));
    }
}
