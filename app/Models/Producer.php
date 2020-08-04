<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
	protected $table = 'producer';
	protected $primaryKey = 'producer_id';
    protected $fillable = ['producer_name','producer_status'];
    
    public function products(){
    	return $this->hasMany(Product::class,'produ_id','producer_id')->Where('products_status',1);
    }
}
