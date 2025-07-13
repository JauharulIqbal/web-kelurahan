<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('id_umkm')->primary();
            $table->uuid('id_kategori')->nullable();
            $table->string('nama_usaha');
            $table->string('pemilik');
            $table->integer('usia_pemilik')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();
            $table->date('awal_mulai_usaha')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori_umkm')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkm');
    }
};
