<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCemetery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cementeries', function (Blueprint $table) {
            $table->bigInteger('unique_views_count')->default(0);
            $table->bigInteger('views_count')->default(0);
            $table->bigInteger('today_views_count')->default(0);
            $table->bigInteger('today_unique_views_count')->default(0);
            $table->boolean('featured')->default(0);
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
            $table->dropColumn('unique_views_count','views_count','today_views_count','today_unique_views_count');
        });
    }
}
