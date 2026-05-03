<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_user')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@pos.com',
                'level_id' => 1,
                'name' => 'Admin POS',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'kasir1',
                'email' => 'kasir1@pos.com',
                'level_id' => 2,
                'name' => 'Kasir 1',
                'password' => Hash::make('kasir123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'manajer1',
                'email' => 'manajer1@pos.com',
                'level_id' => 3,
                'name' => 'Manajer 1',
                'password' => Hash::make('manajer123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
