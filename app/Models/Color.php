<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	protected $primaryKey = 'colors_id';
    protected $fillable = ['colors_name'];
}
