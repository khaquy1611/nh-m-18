<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	protected $table = 'sizes';
	protected $primaryKey = 'sizes_id';
    protected $fillable = ['sizes_name'];
}
