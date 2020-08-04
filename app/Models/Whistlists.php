<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whistlists extends Model
{
	protected $primaryKey = 'whistlist_id';
     protected $fillable = ['customer_id','product_id','whistlist_status'];
}
