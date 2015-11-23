<?php

use Illuminate\Database\Seeder;

class FeedbackValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            ['customer_id'=>1 ,'element_id' => 1, 'value' => 'Abhilash'],
            ['customer_id'=>1 ,'element_id' => 2, 'value' => 'My name is abhilash'],
            ['customer_id'=>1 ,'element_id' => 3, 'value' => 'OK'],
            ['customer_id'=>1 ,'element_id' => 4, 'value' => '1'],
            ['customer_id'=>2 ,'element_id' => 1, 'value' => 'abhinay'],
            ['customer_id'=>2 ,'element_id' => 2, 'value' => 'my name is abhinay'],
            ['customer_id'=>2 ,'element_id' => 3, 'value' => 'Poor'],
            ['customer_id'=>2 ,'element_id' => 4, 'value' => '1'],
            ['customer_id'=>3 ,'element_id' => 1, 'value' => 'mithra'],
            ['customer_id'=>3 ,'element_id' => 2, 'value' => 'myname is mithra'],
            ['customer_id'=>3 ,'element_id' => 3, 'value' => 'Great'],
            ['customer_id'=>3 ,'element_id' => 4, 'value' => '1'],
            ['customer_id'=>4 ,'element_id' => 1, 'value' => 'Abhilash'],
            ['customer_id'=>4 ,'element_id' => 2, 'value' => 'My name is abhilash'],
            ['customer_id'=>4 ,'element_id' => 3, 'value' => 'OK'],
            ['customer_id'=>4 ,'element_id' => 4, 'value' => '1'],
            ['customer_id'=>5 ,'element_id' => 1, 'value' => 'abhinay'],
            ['customer_id'=>5 ,'element_id' => 2, 'value' => 'my name is abhinay'],
            ['customer_id'=>5 ,'element_id' => 3, 'value' => 'Poor'],
            ['customer_id'=>5 ,'element_id' => 4, 'value' => '1'],
            ['customer_id'=>6 ,'element_id' => 1, 'value' => 'mithra'],
            ['customer_id'=>6 ,'element_id' => 2, 'value' => 'myname is mithra'],
            ['customer_id'=>6 ,'element_id' => 3, 'value' => 'Great'],
            ['customer_id'=>6 ,'element_id' => 4, 'value' => '1'],
             
        ];
        DB::table('feedback_values')->insert($values);
    }
}
