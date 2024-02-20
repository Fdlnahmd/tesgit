<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Tambahkan ini jika Anda menggunakan model User

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User(); // Buat instansi model User
        $user->name = 'Nama Pengguna';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('password');
        $user->save(); // Simpan data ke dalam database
    }
}