<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Divisi::factory()->create();

        \App\Models\User::factory()->create([
            'no_karyawan' => '1231234',
            'password' => Hash::make('admin'),
            'role' => 2,
            'name' => ' Admin',
            'divisi_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'no_karyawan' => '1231235',
            'password' => Hash::make('admin'),
            'role' => 3,
            'name' => 'Karyawan',
            'divisi_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'no_karyawan' => '123123',
            'password' => Hash::make('admin'),
            'role' => 1,
            'name' => 'Super Admin',
            'divisi_id' => 1,
        ]);
    }
}
