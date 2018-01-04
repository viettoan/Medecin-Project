<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditDoctorCalendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_calenders', function (Blueprint $table) {
            $table->renameColumn('morning', 'mon');
            $table->renameColumn('afternoon', 'tue');
            $table->renameColumn('night', 'wed');
            $table->integer('thu')->unsigned()->default(0);
            $table->integer('fri')->unsigned()->default(0);
            $table->integer('sat')->unsigned()->default(0);
            $table->integer('sun')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->renameColumn('mon', 'morning');
        $table->renameColumn('tue', 'afternoon');
        $table->renameColumn('wed', 'night');
        $table->dropColumn('thu');
        $table->dropColumn('fri');
        $table->dropColumn('sat');
        $table->dropColumn('sun');
    }
}
