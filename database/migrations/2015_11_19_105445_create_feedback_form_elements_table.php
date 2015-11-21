<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackFormElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_form_elements', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('store_feedback_forms')->onDelete('cascade');
            $table->enum('type', array('TXT', 'TXTA','RAD','CHK'));
            $table->string('title')->nullable();
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
        Schema::drop('feedback_form_elements');
    }
}
