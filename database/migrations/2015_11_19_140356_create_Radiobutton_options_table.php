<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadiobuttonOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radiobutton_options', function(Blueprint $table)
        {
            $table->integer('element_id')->unsigned();
            $table->foreign('element_id')->references('id')->on('feedback_form_elements')->onDelete('cascade');
            $table->string('option')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('radiobutton_options');
    }
}
