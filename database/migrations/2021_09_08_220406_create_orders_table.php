<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->String('buyer_name');
            $table->String('buyer_tel');
            $table->String('buyer_addr');
            $table->String('buyer_email');
            $table->String('amount');
            $table->Text('orderlist');
            $table->String('orderstate');
            $table->Integer('user_id');
            $table->Integer('goods_id');
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
        Schema::dropIfExists('orders');
    }
}
