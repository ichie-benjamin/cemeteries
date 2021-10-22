<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cementeries', function (Blueprint $table) {
            $table->dropUnique('cementeries_slug_unique');
            $table->dropUnique('cementeries_username_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cementeries', function (Blueprint $table) {
        });
    }
}
