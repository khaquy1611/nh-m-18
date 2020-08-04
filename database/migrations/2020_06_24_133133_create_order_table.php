<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
           $table->increments('id');
            $table->tinyInteger('order_status')->default(0);
            $table->string('customers_name',100)->nullable();
            $table->string('customers_email',255)->nullable();
            $table->string('customers_phone',30)->nullable();    
            $table->string('customers_address',255)->nullable();
            $table->string('order_note')->nullable();
            $table->unsignedInteger('customer_order_id');
            $table->timestamps();
            $table->foreign('customer_order_id')->references('id')->on('customers');
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
