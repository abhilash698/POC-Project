<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'abhilash',
            'email' => 'abhilash.aruva@gmail.com',
            'password' => bcrypt('secret'),
            'superuser' => true,
        ]);
    }
}
