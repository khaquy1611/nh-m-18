<?php 
namespace App\Helper;
class CartHelper
{
	public $items = [];

	public $total_quantity = 0;
	public $total_price = 0;
    public function __construct(){
    	$this->items = session('cart') ? session('cart') : [] ;
    	$this->total_price = $this->get_total_price();
    	$this->total_quantity = $this->get_total_quantity();
    }

    public function add($products,$quantity = 1){
    	$item = [
    		'id'=>$products->id,
    		'products_name'=>$products->products_name,
    		'price'=>$products->sale_price ? $products->sale_price : $products->price ,
    		'products_image'=>$products->products_image,
    		'quantity'=>$quantity
    	];
    	if(isset($this->items[$products->id])){
    		$this->items[$products->id]['quantity'] +=	$quantity;
    	}else{
    		$this->items[$products->id] =  $item;
    	}
    	
    	session(['cart'=>$this->items]);

    }

    public function remove($id){
        if($this->items[$id]){
    		unset($this->items[$id]);
    	}
    	session(['cart'=>$this->items]);
    }

    public function update($id,$quantity){
    	$quantity = is_numeric($quantity) ? $quantity : 1;
    	$quantity = $quantity > 0 ? ceil($quantity) : 1;
    	if(isset($this->items[$id])){
    		$this->items[$id]['quantity']  = $quantity;
    		session(['cart'=>$this->items]);
    	}
    	
    }


    public function clear(){
    	session(['cart'=> '']);
    }

    private function get_total_price(){
    	$t = 0;
    	foreach ($this->items as $item) {
    		$t += $item['price'] * $item['quantity'];
    	}
    	return $t;
    }

    private function get_total_quantity(){
    	$t = 0;
    	foreach ($this->items as $item) {
    		$t += $item['quantity'];
    	}
    	return $t;
    }

}


 ?>