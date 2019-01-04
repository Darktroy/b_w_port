<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function(Blueprint $table)
        {
            $table->increments('departement_id');
            $table->timestamps();
            $table->integer('branch_id')->unsigned()->nullable()->index();
            $table->integer('company_id')->unsigned()->nullable()->index();
            $table->string('name', 255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departements');
    }
}
