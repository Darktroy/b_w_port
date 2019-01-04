<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_to_companies', function(Blueprint $table)
        {
            $table->increments('userToCompany_id');
            $table->timestamps();
            $table->integer('company_id')->unsigned()->nullable()->index();
            $table->integer('user_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_to_companies');
    }
}
