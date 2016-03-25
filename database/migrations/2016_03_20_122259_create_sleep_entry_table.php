<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSleepEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sleep', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0);
            $table->time('went_to_sleep');
            $table->time('woke_up');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('sleep_quality')->default(0);
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
        Schema::drop('sleep');
    }
}
