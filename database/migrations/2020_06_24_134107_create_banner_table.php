<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('Banner', function (Blueprint $table) {
            $table->increments('banner_id');
            $table->string('banner_name')->unique();
            $table->String('banner_image')->nullable();
            $table->String('banner_link',255);
            $table->String('banner_title',255);
            $table->text('banner_description',255);
            $table->tinyInteger('banner_status')->default(0);
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
        Schema::dropIfExists('Banner');
    }
}
