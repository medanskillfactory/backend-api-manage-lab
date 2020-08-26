<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\TypeReport;
use App\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alvantesha Priliandi',
            'email' => 'palvantesha@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'phone' => '081263506016',
            'address' => 'Jl. medan binjai'
        ]);

        User::create([
            'name' => 'Teknisi 1',
            'email' => 'teknisi.1@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'teknisi',
            'phone' => '081263506016',
            'address' => 'Jl. medan binjai'
        ]);

        User::create([
            'name' => 'Pimpinan 1',
            'email' => 'pimpinan.1@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'pimpinan',
            'phone' => '081263506016',
            'address' => 'Jl. medan binjai'
        ]);

        TypeReport::create([
            'name' => 'Harian',
            'description' => 'Harian adalah tipe report yang harus dilakukan setiap hari'
        ]);

        TypeReport::create([
            'name' => '3 bulan',
            'description' => 'Harian adalah tipe report yang harus dilakukan setiap 3 bulan sekali'
        ]);

        TypeReport::create([
            'name' => '6 bulan',
            'description' => 'Harian adalah tipe report yang harus dilakukan setiap 6 bulan sekali'
        ]);

        Room::create([
            'code' => 'Lab-com-1',
            'name' => 'Labolatorium Computer 1',
            'description' => 'Lab Komputer TKJ'
        ]);
        // $this->call(UserSeeder::class);
    }
}
