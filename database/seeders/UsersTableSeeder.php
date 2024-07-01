<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Nama Guru 1',
                'email' => 'guru1@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('xEYnws6y'),
                'role' => 'guru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nama Guru 2',
                'email' => 'guru2@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('xEYnws6y'),
                'role' => 'guru',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data guru lainnya jika diperlukan
        ]);
    }
}
