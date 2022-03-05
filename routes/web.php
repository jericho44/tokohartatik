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

Route::get('/', function () {
    return view('welcome');
});

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

        // Route::resource('roles', 'RoleController');
        // Route::resource('users', 'UserController');

        // Route::get('orders/trashed', 'OrderController@trashed');
        // Route::get('orders/restore/{orderID}', 'OrderController@restore');
        // Route::resource('orders', 'OrderController');
        // Route::get('orders/{orderID}/cancel', 'OrderController@cancel');
        // Route::put('orders/cancel/{orderID}', 'OrderController@doCancel');
        // Route::post('orders/complete/{orderID}', 'OrderController@doComplete');

        // Route::resource('shipments', 'ShipmentController');

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
