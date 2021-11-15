<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index()->unsigned();
            $table->boolean('memorial_updates')->default(0);
            $table->boolean('allow_messages')->default(1);
            $table->boolean('show_email')->default(0);
            $table->boolean('message_email_noty')->default(1);
            $table->boolean('photo_request')->default(0);
            $table->boolean('site_update')->default(0);
            $table->boolean('offers')->default(0);
            $table->boolean('newsletter')->default(0);
            $table->string('theme')->default('light');
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
        Schema::dropIfExists('user_settings');
    }
}
