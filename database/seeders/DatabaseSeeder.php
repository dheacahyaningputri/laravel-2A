<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
{
    // \App\Models\User::factory(10)->create();
    //... seeder lain yang sudah ada biarkan ...

    //tambahkan AdminSeeder
    $this->call(AdminSeeder::class);
}
}
