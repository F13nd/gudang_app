<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'supplier 1',
                'email' => 'supplier1@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$fTnGPW9/DVd.bOslzeD5Ru9Yxz2GDV5iaVUFlGVQB1VYnQkWITIMG',
                'role' => 'supplier',
                'remember_token' => NULL,
                'created_at' => '2022-04-20 22:34:03',
                'updated_at' => '2022-04-20 22:34:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'supplier 2',
                'email' => 'supplier2@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xphHE06gu0j7VO2.Dd1dDejv/FEPPIT9akSE8ZFywsVUJxXyTe5EC',
                'role' => 'supplier',
                'remember_token' => NULL,
                'created_at' => '2022-04-20 22:34:12',
                'updated_at' => '2022-04-20 22:34:12',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'distributor 1',
                'email' => 'distributor1@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$z6QEiwN6vlPIx6Dj9STSg.PDpTSHMCSu7FI1/JYtDYm.HIY4IddmW',
                'role' => 'distributor',
                'remember_token' => NULL,
                'created_at' => '2022-04-20 22:34:36',
                'updated_at' => '2022-04-20 22:34:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'distributor 2',
                'email' => 'distributor2@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CYwPjYgJ.horHMknlkYwr.dtJJpOgQkKNDAWnXy8DRZ8B9Wy0R4i6',
                'role' => 'distributor',
                'remember_token' => NULL,
                'created_at' => '2022-04-20 22:34:44',
                'updated_at' => '2022-04-20 22:34:44',
            ),
        ));
        
        
    }
}