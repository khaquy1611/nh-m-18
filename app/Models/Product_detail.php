<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
	protected $table = 'product_detail';
	protected $primaryKey = 'product_detail_id';
 	protected $fillable = ['product_id','color_id','size_id','image_id'];
 	public function product(){
 		return $this->hasOne(Product::class,'id','product_id');
 	}
 	
}
