<?php

use Illuminate\Database\Seeder;

class StoreFeedbackFormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forms = [
            ['store_id' => 1, 'form_name' => 'First Form']
        ];
        DB::table('store_feedback_forms')->insert($forms);
    }
}
