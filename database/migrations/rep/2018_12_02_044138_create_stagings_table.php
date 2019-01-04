<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagings', function(Blueprint $table)
        {
            $table->increments('staging_id');
            $table->timestamps();
            $table->integer('user_id')->unsigned()->index();
            $table->string('registration')->nullable();
            $table->string('active_account')->nullable();
            $table->string('creation_own_profile')->nullable();
            $table->string('creation_own_card')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stagings');
    }
}
