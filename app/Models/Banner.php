<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	protected $table = 'banner';
	protected $primaryKey = 'banner_id';
    protected $fillable = ['banner_name','banner_image','banner_link','banner_title','banner_description','banner_status'];
}
