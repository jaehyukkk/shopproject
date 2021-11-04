<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email');
            $table->string('birthday');
            $table->string('sex');
            $table->string('tel');
            $table->string('addr');
            $table->text('detailaddr');
            $table->string('post');
            $table->integer('level');
            $table->integer('social');
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
            $table->dropColumn('email');
            $table->dropColumn('birthday');
            $table->dropColumn('sex');
            $table->dropColumn('tel');
            $table->dropColumn('addr');
            $table->dropColumn('detailaddr');
            $table->dropColumn('post');
            $table->dropColumn('level');
            $table->dropColumn('social');
        });
    }
}
