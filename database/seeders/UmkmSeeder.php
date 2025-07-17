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
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Warung Ayam Geprek',
            'pemilik' => 'Ahmad Junaidi',
            'usia_pemilik' => 33,
            'pendidikan_terakhir' => 'S1',
            'deskripsi' => 'Rasakan Ayam Terenaakkk',
            'alamat' => 'Jl. Melati No. 23',
            'rt' => '03',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/ayam_geprek.png'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Es Jeruk Peras',
            'pemilik' => 'Asep Junaidi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'D3',
            'deskripsi' => 'Raskaan kesegarannya.',
            'alamat' => 'Jl. Mawar No. 12',
            'rt' => '02',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/jerukperas.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Alpukat Kocok',
            'pemilik' => 'Firda Adinda',
            'usia_pemilik' => 25,
            'pendidikan_terakhir' => 'SMK',
            'deskripsi' => 'Rasakan Alpukat terenak.',
            'alamat' => 'Jl. Bugenvile No. 22',
            'rt' => '02',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/alpukatkocok.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Batik Legenda',
            'pemilik' => 'Sulistiawati',
            'usia_pemilik' => 55,
            'pendidikan_terakhir' => 'S1',
            'deskripsi' => 'Pembuatan batik legenda.',
            'alamat' => 'Jl. Mawar No. 3',
            'rt' => '02',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/batiklegenda.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Molen Aneka Rasa',
            'pemilik' => 'Aldi Satria',
            'usia_pemilik' => 29,
            'pendidikan_terakhir' => 'S2',
            'deskripsi' => 'Rasakan berbagai macam rasa produk molen kami.',
            'alamat' => 'Jl. Menanggal Utama',
            'rt' => '02',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/molen_aneka_rasa.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '06',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '07',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '02',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '01',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
        Umkm::create([
            'id_umkm' => Str::uuid(),
            'id_kategori' => $kategoriJasa->id_kategori,
            'nama_usaha' => 'Fresh Printing',
            'pemilik' => 'Bambang Abadi',
            'usia_pemilik' => 39,
            'pendidikan_terakhir' => 'SMA',
            'deskripsi' => 'Jasa printing 1 jam jadi.',
            'alamat' => 'Jl. Menanggal Barat No. 12',
            'rt' => '01',
            'rw' => '01',
            'awal_mulai_usaha' => '2018-06-01',
            'no_telp' => '08987654321',
            'foto' => 'foto/freshprinting.jpg'
        ]);
    }
}
