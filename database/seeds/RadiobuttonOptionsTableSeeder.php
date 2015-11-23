<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RadiobuttonOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buttons = [
            ['element_id' => 3, 'option' => 'Very Poor'],
            ['element_id' => 3, 'option' => 'Poor'],
            ['element_id' => 3, 'option' => 'OK'],
            ['element_id' => 3, 'option' => 'good'],
            ['element_id' => 3, 'option' => 'Great'],
            ['element_id' => 4, 'option' => 'Hyderabad'],
            ['element_id' => 4, 'option' => 'Bangalore'],
            ['element_id' => 4, 'option' => 'Chennai'],
            ['element_id' => 4, 'option' => 'Mumbai'],
            ['element_id' => 4, 'option' => 'New Delhi'],
        ];
        DB::table('radiobutton_options')->insert($buttons);
    }
}
