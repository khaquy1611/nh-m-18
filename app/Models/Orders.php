<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = ['order_status','customers_name','customers_email','customers_phone','customers_address','customer_order_id','order_note'];
}
