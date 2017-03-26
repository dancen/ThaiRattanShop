<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */




// routes for the e-shop home page (app/views/index.blade.php)
Route::get('/', 'ShopController@index');
Route::get('/index', 'ShopController@index')->name('index');

// route for the products by category page (app/views/category.blade.php)
Route::get('/show-products/{slug}', 'ShopController@category')->name('show-products');

// route for the detail product page (app/views/buy.blade.php)
Route::get('/show-product/{slug}', 'ShopController@showProduct')->name('show-product');

// route for the shopping cart page (app/views/cart.blade.php)
Route::post('/cart', 'ShopController@addToCart')->name('cart');

// route to show the shopping cart (app/views/cart.blade.php)
Route::get('/cart-show', 'ShopController@showCart')->name('cart-show');

// route to update the shopping cart (app/views/cart.blade.php)
Route::post('/cart-update', 'ShopController@updateCart')->name('cart-update');

// route to update the shopping cart (app/views/cart.blade.php)
Route::post('/cart-delivery', 'ShopController@deliveryCart')->name('cart-delivery');

// route to update the shopping cart (app/views/cart.blade.php)
Route::get('/cart-delivery-changed', 'ShopController@deliveryCartChangedAjax')->name('cart-delivery-changed');

// route to update the shopping cart (app/views/cart.blade.php)
Route::get('/cart-quantity-changed', 'ShopController@quantityCartChangedAjax')->name('cart-quantity-changed');

// route for the shopping cart page (app/views/cart.blade.php)
Route::post('/cart-remove', 'ShopController@removeCart')->name('cart-remove');

// route for the checkout page (app/views/checkout.blade.php)
Route::get('/cart-checkout', 'ShopController@checkout')->name('cart-checkout');

// route for the saving of order data
Route::post('/cart-pay', 'ShopController@pay')->name('cart-pay');

// route for the saving purchasing data page (redirect to close)
Route::get('/finalize', 'ShopController@finalize')->name('cart-finalize');

// route for the closing page (app/views/pay.blade.php)
Route::get('/close', 'ShopController@close')->name('close');

// route for the closing page (app/views/pay.blade.php)
Route::get('/thanks', 'ShopController@thanks')->name('thanks');

// route for the color tester page (app/views/tester.blade.php)
Route::get('/color-tester', 'ShopController@tester')->name('color-tester');

// route for the restricted area (app/views/tester.blade.php)
Route::get('/staff-only', 'ShopController@staff')->name('staff-only');

// route for the product not found (app/views/notfound.blade.php)
Route::get('/not-found', 'ShopController@notFound')->name('not-found');

// route for the product not found (app/views/notfound.blade.php)
Route::get('/expired', 'ShopController@expired')->name('expired');

// route to flush memory data
Route::get('/restart', 'ShopController@restart')->name('restart');

// route to manage orders
Route::get('/manager', 'OrdersController@manager')->name('manager');


//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});


Auth::routes();
Route::get('/home', 'HomeController@index');


