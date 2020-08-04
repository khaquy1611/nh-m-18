<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
	protected $primaryKey = 'image_id';
     protected $fillable = ["image_name"];
}
