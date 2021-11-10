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

Route::view('/', 'site.pages.homepage');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');

Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');

    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
});

Auth::routes();
require 'admin.php';
Route::get('/listarCategoriaPdf', 'Admin\CategoryController@listarPdf')->name('categorias_pdf');
Route::get('/listarProductoPdf', 'Admin\ProductController@listarPdf')->name('productos_pdf');
Route::get('/listarUsuariosPdf', 'Admin\AdminController@listarPdf')->name('usuarios_pdf');
Route::get('/listarClientesPdf', 'Admin\ClientController@listarPdf')->name('clientes_pdf');
Route::get('/listarOrdenesPdf', 'Admin\OrderController@listarPdf')->name('ordenes_pdf');
Route::get('/admin', 'Admin\DataController@index')->name('admin.dashboard');
Route::resource('roles', 'Admin\RolController'); 
Route::resource('users', 'Admin\AdminController'); 