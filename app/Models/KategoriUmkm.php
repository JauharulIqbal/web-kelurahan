<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KategoriUmkm extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = 'kategori_umkm';
    protected $primaryKey = 'id_kategori';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_kategori',
    ];

    public function umkm()
    {
        return $this->hasMany(Umkm::class, 'id_kategori');
    }
}
