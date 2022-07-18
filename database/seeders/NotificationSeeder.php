<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'status' => 'Success',
            'message' => 'Your order has been placed successfully!!!'
        ]);

        DB::table('notifications')->insert([
            'status' => 'Error',
            'message' => 'Something went wrong, please try again!!!'
        ]);
    }
}
