<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('moodle_id')->after('email')->nullable();
            $table->boolean('cfh')->default(false);
            $table->string('board_of_director')->after('position')->nullable();
            $table->string('area')->after('position')->nullable();
            $table->string('sub_area')->after('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'moodle_id',
                'cfh',
                'board_of_director',
                'area',
                'sub_area',
            ]);
        });
    }
};
