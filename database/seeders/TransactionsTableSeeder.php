<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transactions')->delete();
        
        \DB::table('transactions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'type' => 'in',
                'value' => 10,
                'created_at' => '2022-04-20 22:35:24',
                'updated_at' => '2022-04-20 22:35:24',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'product_id' => 1,
                'type' => 'in',
                'value' => 15,
                'created_at' => '2022-04-20 22:35:28',
                'updated_at' => '2022-04-20 22:35:28',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'product_id' => 1,
                'type' => 'in',
                'value' => 50,
                'created_at' => '2022-04-20 22:35:32',
                'updated_at' => '2022-04-20 22:35:32',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'product_id' => 2,
                'type' => 'in',
                'value' => 100,
                'created_at' => '2022-04-20 22:36:18',
                'updated_at' => '2022-04-20 22:36:18',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'product_id' => 2,
                'type' => 'in',
                'value' => 20,
                'created_at' => '2022-04-20 22:36:31',
                'updated_at' => '2022-04-20 22:36:31',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 2,
                'product_id' => 1,
                'type' => 'in',
                'value' => 200,
                'created_at' => '2022-04-20 22:37:00',
                'updated_at' => '2022-04-20 22:37:00',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 3,
                'product_id' => 1,
                'type' => 'out',
                'value' => 25,
                'created_at' => '2022-04-20 22:37:20',
                'updated_at' => '2022-04-20 22:37:20',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 3,
                'product_id' => 1,
                'type' => 'out',
                'value' => 5,
                'created_at' => '2022-04-20 22:37:28',
                'updated_at' => '2022-04-20 22:37:28',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 3,
                'product_id' => 2,
                'type' => 'out',
                'value' => 50,
                'created_at' => '2022-04-20 22:37:36',
                'updated_at' => '2022-04-20 22:37:36',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 4,
                'product_id' => 2,
                'type' => 'out',
                'value' => 10,
                'created_at' => '2022-04-20 22:37:50',
                'updated_at' => '2022-04-20 22:37:50',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 4,
                'product_id' => 1,
                'type' => 'out',
                'value' => 70,
                'created_at' => '2022-04-20 22:37:57',
                'updated_at' => '2022-04-20 22:37:57',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 4,
                'product_id' => 1,
                'type' => 'out',
                'value' => 5,
                'created_at' => '2022-04-20 22:38:04',
                'updated_at' => '2022-04-20 22:38:04',
            ),
        ));
        
        
    }
}