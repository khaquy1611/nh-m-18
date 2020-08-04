<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	protected $table = "slider";
	protected $primaryKey = 'slider_id';
    protected $fillable = ['slider_name','slider_image','slider_link','slider_title','slider_description','slider_status'];
}
