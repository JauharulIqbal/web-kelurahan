<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Umkm extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = 'umkm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_usaha',
        'pemilik',
        'usia_pemilik',
        'pendidikan_terakhir',
        'deskripsi',
        'alamat',
        'rt',
        'rw',
        'kategori',
        'awal_mulai_usaha',
        'no_telp',
        'foto',
    ];
}
