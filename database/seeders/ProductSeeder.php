<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=12;$i++){
            DB::table('products')->insert([
                'name' => 'Name of product No. ' . $i,
                'description' => 'Description of product No. ' . $i,
                'image' => 'image' . $i,
                'price' => rand(499,1499) . '.' . rand(10,99),
            ]);
        }
    }
}
