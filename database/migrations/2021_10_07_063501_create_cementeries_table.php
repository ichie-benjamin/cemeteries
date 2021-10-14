<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCementeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cementeries', function(Blueprint $table)
        {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique();
            $table->string('username', 255)->unique();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('approved')->default(0);
            $table->string('municipalities')->nullable();
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->string('template')->default('default');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
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
        Schema::drop('cementeries');
    }
}
