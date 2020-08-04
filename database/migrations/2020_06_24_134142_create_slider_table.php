<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('slider', function (Blueprint $table) {
            $table->increments('slider_id');
            $table->string('slider_name')->unique();
            $table->String('slider_image')->nullable();
            $table->String('slider_link',255);
            $table->String('slider_title',255);
            $table->text('slider_description',255);
            $table->tinyInteger('slider_status')->default(0);
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
        Schema::dropIfExists('slider');
    }
}
