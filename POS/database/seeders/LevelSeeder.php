<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_level')->insert([
            ['level_name' => 'Admin', 'description' => 'Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['level_name' => 'Kasir', 'description' => 'Kasir', 'created_at' => now(), 'updated_at' => now()],
            ['level_name' => 'Manajer', 'description' => 'Manajer Toko', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
