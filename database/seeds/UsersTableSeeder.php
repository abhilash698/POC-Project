<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
            ['name' => 'superadmin', 'email' => 'superadmin@gmail.com', 'password' => bcrypt('secret'), 'superuser' => true],
            ['name' => 'storeadmin', 'email' => 'storeadmin@gmail.com', 'password' => bcrypt('secret'), 'superuser' => false],
        ];
        DB::table('users')->insert($users);
    }
}
