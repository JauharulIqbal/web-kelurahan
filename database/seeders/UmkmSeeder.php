<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Support\Str;
use App\Models\KategoriUmkm;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    public function run()
    {
        $kategoriMakanan = KategoriUmkm::where('nama_kategori', 'Makanan')->first();
        $kategoriJasa = KategoriUmkm::where('nama_kategori', 'Jasa')->first();
        
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriMakanan->id_kategori,
            'nama_usaha' => 'Warung Makan Bu Siti',
            'pemilik' => 'Siti Aminah',
            'usia_pemilik' => 45,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Menjual makanan khas Jawa Timur.',
            'alamat' => 'Jl. Mawar No. 5',
            'rt' => '03',
            'rw' => '07',
            'awal_mulai_usaha' => '2010-03-15',
            'no_telp' => '08123456789',
            'foto' => 'foto/warung_bu_siti.jpg'
        ]);

        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Laundry Bersih Kilat',
            'pemilik' => 'Ahmad Fadli',
            'usia_pemilik' => 30,
            'pendidikan_terakhir' => 'D3',
            'deskripsi' => 'Jasa laundry 1 hari jadi.',
            'alamat' => 'Jl. Melati No. 12',
            'rt' => '02',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/laundry_kilat.jpg'
        ]);
    }
}
