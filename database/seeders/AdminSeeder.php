<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Kelurahan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('MenanggalAdmin12345'),
        ]);
    }
}
