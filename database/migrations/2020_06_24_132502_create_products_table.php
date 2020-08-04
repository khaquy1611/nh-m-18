<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('products_name',100)->unique();
            $table->float('price',9,3);
            $table->float('sale_price',9,3);
            $table->string('brand',100);
            $table->String('products_image')->nullable();
            $table->text('products_descripttion');
            $table->tinyInteger('products_status')->default(0);
            $table->tinyInteger('ordering')->default(0);
            $table->unsignedInteger('cat_id');
            $table->unsignedInteger('produ_id');
            $table->timestamps();
            $table->foreign('cat_id')->references('categories_id')->on('categories');
            $table->foreign('produ_id')->references('producer_id')->on('producer');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
