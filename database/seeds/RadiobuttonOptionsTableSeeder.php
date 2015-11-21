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
        ];
        DB::table('radiobutton_options')->insert($buttons);
    }
}
