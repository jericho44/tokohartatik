<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/product/{slug}', 'ShopController@show')->name('product.details');

Route::get('/carts', 'CartController@index')->name('carts');
Route::get('/carts/remove/{cartID}', 'CartController@destroy')->name('carts.remove');
Route::post('/carts', 'CartController@store')->name('carts.add');
Route::post('/carts/update', 'CartController@update')->name('carts.update');

Route::get('orders/checkout', 'OrderController@checkout')->name('orders.checkout');
Route::post('orders/checkout', 'OrderController@doCheckout')->name('orders.doCheckout');
Route::post('orders/shipping-cost', 'OrderController@shippingCost')->name('orders.shippingCost');
Route::post('orders/set-shipping', 'OrderController@setShipping')->name('orders.setShipping');
Route::get('orders/received/{orderID}', 'OrderController@received')->name('orders.received');
Route::get('orders/invoice', 'OrderController@invoice')->name('orders.invoice');
Route::get('orders/cities', 'OrderController@cities')->name('orders.cities');

Route::post('payments/notification', 'PaymentController@notification')->name('payments.notification');
Route::get('payments/completed', 'PaymentController@completed')->name('payment.completed');
Route::get('payments/failed', 'PaymentController@failed')->name('payments.failed');
Route::get('payments/unfinish', 'PaymentController@unfinish')->name('payments.unfinish');


Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', 'CategoryController');

        Route::delete('products/{id}/delete-permatent', [ProductController::class, 'deletePermanent'])->name('products.deletePermanent');
        Route::get('products/images', 'ProductController@images')->name('products.images');
        Route::get('products/{id}/add-image', 'ProductController@addImage')->name('products.add_image');
        Route::post('products/images/{id}', 'ProductController@uploadImage')->name('products.upload_image');
        Route::get('products/images/{id}', 'ProductController@viewImage')->name('products.view_image');
        Route::delete('products/images/{id}', 'ProductController@removeImage')->name('products.remove_image');
        Route::resource('products', 'ProductController');

        Route::delete('attributes/{id}/delete-permatent', 'AttributeController@deletePermanent')->name('attributes.deletePermanent');
        Route::get('attributes/{attributeID}/options', 'AttributeController@options')->name('attributes.options');
        Route::get('attributes/{attributeID}/add-option', 'AttributeController@add_option')->name('attributes.add_option');
        Route::post('attributes/options/{attributeID}', 'AttributeController@store_option')->name('attributes.store_option');
        Route::delete('attributes/options/{optionID}', 'AttributeController@remove_option')->name('attributes.remove_option');
        Route::get('attributes/options/{optionID}/edit', 'AttributeController@edit_option')->name('attributes.edit_option');
        Route::put('attributes/options/{optionID}', 'AttributeController@update_option')->name('attributes.update_option');
        Route::resource('attributes', 'AttributeController');

        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');

        Route::get('orders/trashed', 'OrderController@trashed')->name('orders.trashed');
        Route::get('orders/restore/{orderID}', 'OrderController@restore')->name('orders.restore');
        Route::get('orders/{orderID}/cancel', 'OrderController@cancel')->name('orders.cancel');
        Route::put('orders/cancel/{orderID}', 'OrderController@doCancel')->name('orders.doCancel');
        Route::post('orders/complete/{orderID}', 'OrderController@doComplete')->name('orders.doComplete');
        Route::resource('orders', 'OrderController');

        Route::resource('shipments', 'ShipmentController');

        // Route::resource('slides', 'SlideController');
        // Route::get('slides/{slideID}/up', 'SlideController@moveUp');
        // Route::get('slides/{slideID}/down', 'SlideController@moveDown');

        // Route::get('reports/revenue', 'ReportController@revenue');
        // Route::get('reports/product', 'ReportController@product');
        // Route::get('reports/inventory', 'ReportController@inventory');
        // Route::get('reports/payment', 'ReportController@payment');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
