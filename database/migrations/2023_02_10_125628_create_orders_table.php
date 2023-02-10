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
            $table->string('received_name');
            $table->string('received_phone', 10);
            $table->string('received_address');
            $table->float('sub_total');
            $table->float('tax');
            $table->float('total');
            $table->tinyInteger('status')->default(1);//1: pending, 2: shipping, 3: delivered, 4: canceled
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
