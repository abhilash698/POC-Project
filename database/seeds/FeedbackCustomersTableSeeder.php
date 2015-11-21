<?php

use Illuminate\Database\Seeder;

class FeedbackCustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $customers = [
            ['form_id' => 1],
            ['form_id' => 1],
            ['form_id' => 1],
        ];
        DB::table('feedback_customers')->insert($customers);
    }
}
