<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorials', function(Blueprint $table)
        {
            $table->id();
            $table->bigInteger('cemetery_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->boolean('active')->default(1);
            $table->boolean('is_famous')->default(0);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('birth_month')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('death_day')->nullable();
            $table->string('death_month')->nullable();
            $table->string('death_year')->nullable();
            $table->string('birth_location')->nullable();
            $table->string('death_location')->nullable();
            $table->string('bio')->nullable();
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->string('image')->nullable();
            $table->foreign('cemetery_id')->references('id')->on('cementeries')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('memorials');
    }
}
