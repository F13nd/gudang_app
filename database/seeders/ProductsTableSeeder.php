<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Susu Ultra',
                'stock' => 170,
                'description' => 'Susu ultra 210ml',
                'created_at' => '2022-04-20 22:35:24',
                'updated_at' => '2022-04-20 22:38:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sprite',
                'stock' => 60,
                'description' => 'Sprite 1,5 L',
                'created_at' => '2022-04-20 22:36:18',
                'updated_at' => '2022-04-20 22:37:50',
            ),
        ));
        
        
    }
}