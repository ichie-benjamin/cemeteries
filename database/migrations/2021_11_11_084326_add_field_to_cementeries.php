<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToCementeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cementeries', function (Blueprint $table) {
            $table->boolean('is_public')->default(1)->after('featured');
            $table->boolean('virtual')->default(0)->after('featured');
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
            $table->dropColumn('is_public','virtual');
        });
    }
}
