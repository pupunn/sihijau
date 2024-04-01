<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsVisibleToIndikatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indikator', function (Blueprint $table) {
            $table->boolean('is_visible')->default(1)->after('template');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indikator', function (Blueprint $table) {
            $table->dropColumn('is_visible');
        });
    }
}
