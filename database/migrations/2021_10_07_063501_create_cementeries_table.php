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
            $table->string('slug', 255)->nullable();
            $table->string('username', 255)->nullable();
            $table->text('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->decimal('longitude')->nullable();
            $table->decimal('latitude')->nullable();
            $table->string('status')->default('pending');
            $table->boolean('approved')->default(0);
            $table->text('municipalities')->nullable();
            $table->string('website')->nullable();
            $table->text('image')->nullable();
            $table->string('template')->default('default');
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('unique_views_count')->default(0);
            $table->bigInteger('views_count')->default(0);
            $table->bigInteger('today_views_count')->default(0);
            $table->bigInteger('today_unique_views_count')->default(0);
            $table->boolean('featured')->default(0);
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
