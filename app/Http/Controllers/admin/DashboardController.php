<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriUmkm;
use App\Models\Umkm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKategori = KategoriUmkm::count();
        $jumlahUmkm = Umkm::count();

        $dataRw = Umkm::selectRaw('rw, COUNT(*) as total')
            ->groupBy('rw')
            ->orderBy('rw')
            ->pluck('total');

        $labelRw = Umkm::selectRaw('rw')
            ->groupBy('rw')
            ->orderBy('rw')
            ->pluck('rw')
            ->map(function ($rw) {
                return 'RW ' . str_pad($rw, 2, '0', STR_PAD_LEFT);
            });

        $umkmList = Umkm::with('kategori')
            ->orderBy('created_at') 
            ->paginate(10);

        return view('admin.dashboard', [
            'jumlahKategori' => $jumlahKategori,
            'jumlahUmkm' => $jumlahUmkm,
            'dataRW' => $dataRw,
            'labelRW' => $labelRw,
            'chartColors' => [
                '#0d6efd',
                '#198754',
                '#ffc107',
                '#dc3545',
                '#6f42c1',
                '#20c997',
                '#fd7e14',
                '#6610f2',
                '#0dcaf0',
                '#6c757d'
            ],
            'umkmList' => $umkmList,
        ]);
    }
}
