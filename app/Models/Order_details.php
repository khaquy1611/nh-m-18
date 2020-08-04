<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = ['product_id','order_id','quantity','price'];
}
