<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FormElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elements = [
            ['form_id' => 1, 'type' => 'TXT', 'title' => 'Enter your name'],
            ['form_id' => 1, 'type' => 'TXTA', 'title' => 'Describe yourself'],
            ['form_id' => 1, 'type' => 'RAD', 'title' => 'How would you discribe your experience with Maxwell?'],
            ['form_id' => 1, 'type' => 'CHK', 'title' => 'I accept all terms & conditions'],
        ];
        DB::table('feedback_form_elements')->insert($elements);
    }
}
