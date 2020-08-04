<?php 
// Route dành cho fontend
Route::group(['prefix'=>'fontend','namespace'=>'Fontend'],function(){
Route::get('/','FontendController@index')->name('fontend.index');
Route::get('/category','FontendController@category')->name('fontend.category');
Route::get('/product_detail/{id?}','FontendController@product')->name('fontend.product');
Route::get('/contact','FontendController@contact')->name('fontend.contact');
Route::post('/contact','FontendController@contact_post')->name('fontend.contact');
Route::get('/{slug}','FontendController@slug')->name('category');
Route::post('/search','FontendController@search')->name('search');
});
// Route dành cho khách hàng
Route::group(['prefix'=>'customer','middleware'=>'cus'],function(){
Route::get('logout','CustomerController@logout')->name('fontend.logout');
});
// Route dành cho giỏ hàng
Route::group(['prefix'=>'cart'],function(){
Route::get('cart_add/{id}','CartController@add')->name('cart.add');
Route::get('cart_view','CartController@view')->name('cart.view');
Route::get('cart_remove/{id}','CartController@remove')->name('cart.remove');
Route::get('cart_update/{id}','CartController@update')->name('cart.update');
Route::get('cart_clear','CartController@clear')->name('cart.clear');
});
// Route dành cho đơn hàng
Route::group(['prefix'=>'checkout'],function(){
Route::get('/','CheckoutController@form')->name('fontend.checkout');
Route::post('/','CheckoutController@submit_form')->name('fontend.checkout');
Route::get('/checkout_success','CheckoutController@success')->name('checkout.success');

});

// Route dành cho wishlist
Route::group(["prefix"=>"whistlist"],function(){
Route::get('whistlist_add/{id}','Fontend\WhistlistsController@add_whistlist')->name('whistlist.add');
});




Route::get('/customer/register','CustomerController@register')->name('fontend.register');
Route::post('/customer/register','CustomerController@post_register')->name('fontend.register');
Route::get('/customer/sign_in','CustomerController@sign_in')->name('fontend.sign_in');
Route::post('/customer/sign_in','CustomerController@post_sign_in')->name('fontend.sign_in');


 ?>