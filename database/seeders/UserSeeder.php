<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Almighty',
            'email' => 'admin@mail.com',
            'phone_number' => '091929798',
            'address' => 'Everywhere',
            'city' => 'Zion',
            'is_admin' => 1,
            'password' => Hash::make('password'),

        ]);

        for($i=1;$i<=100;$i++){
            DB::table('users')->insert([
                'firstname' => 'Name No. ' . $i,
                'lastname' => 'Surname No. ' . $i,
                'email' => 'email' . $i . '@mail.com',
                'phone_number' => '987321654' . $i,
                'address' => 'Address No. ' . $i . ' ' . rand(1,250),
                'city' => 'City No. ' . rand(1,10),
                'password' => Hash::make('user_pass'),
            ]);
        }
    }
}
