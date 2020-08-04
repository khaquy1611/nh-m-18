<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'categories_id';
    protected $fillable = ['categories_name','slug','parent_id','categories_status'];
    
     public function childs(){
    	return $this->hasMany(Category::class,'parent_id','categories_id');
    }
    public function products(){
    	return $this->hasMany(Product::class,'cat_id','categories_id')->Where('products_status',1);
    }
}
