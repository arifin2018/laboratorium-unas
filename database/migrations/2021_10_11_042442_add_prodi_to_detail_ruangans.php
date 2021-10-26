<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdiToDetailRuangans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_ruangans', function (Blueprint $table) {
            $table->bigInteger('prodi_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_ruangans', function (Blueprint $table) {
            $table->dropColumn('prodi_id');
        });
    }
}
