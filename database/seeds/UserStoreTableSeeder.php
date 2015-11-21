<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserStoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_store')->insert([
            'user_id' => 1,
            'store_name' => 'MaxCare',
            'city' => 'Hyderabad',
        ]);
    }
}
