<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriUmkm;
use Illuminate\Support\Str;

class KategoriUmkmSeeder extends Seeder
{
    public function run()
    {
        KategoriUmkm::create([
            'id_kategori' => Str::uuid(),
            'nama_kategori' => 'Makanan',
        ]);
        KategoriUmkm::create([
            'id_kategori' => Str::uuid(),
            'nama_kategori' => 'Minuman',
        ]);
        KategoriUmkm::create([
            'id_kategori' => Str::uuid(),
            'nama_kategori' => 'Jasa',
        ]);
        KategoriUmkm::create([
            'id_kategori' => Str::uuid(),
            'nama_kategori' => 'Terserah',
        ]);
    }
}