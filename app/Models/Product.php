<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = ['products_name','price','sale_price','brand','ordering','products_image','products_descripttion','products_status','cat_id','produ_id'];
    public function cats(){
    	return $this->hasOne(Category::class,'categories_id','cat_id');
    }

    public function producer(){
    	return $this->hasOne(Producer::class,'producer_id','produ_id');
    }
    public function product_detail(){
    	return $this->hasMany(Product_detail::class,'product_id','id');
    }

     public function images(){
        return $this->belongsToMany(Images::class,'product_detail','product_id','image_id');
    }

}
