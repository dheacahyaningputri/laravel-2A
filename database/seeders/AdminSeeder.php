<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//tambahkan DB dan HASH untuk enkripsi
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $daftar = ['dhea', 'budi', 'sinta', 'anton', 'ani'];

        foreach ($daftar as $i => $nama) {
            DB::table('admins')->insert([
                'id_admin'   => $i + 1,
                'username'   => $nama,
                'password'   => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}