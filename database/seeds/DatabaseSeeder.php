<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(UserStoreTableSeeder::class);
        $this->call(StoreFeedbackFormsTableSeeder::class);
        $this->call(FormElementsTableSeeder::class);
        $this->call(RadiobuttonOptionsTableSeeder::class);
        $this->call(FeedbackCustomersTableSeeder::class);
        $this->call(FeedbackValuesTableSeeder::class);

        Model::reguard();
    }
}
