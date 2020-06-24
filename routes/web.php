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

Route::get('/', 'Store\StoreController@home')->name('store.home');
Route::get('/home', 'Store\StoreController@home')->name('store.home');

Route::get('login', function () {
    return view('admin.login');
})->name('login');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('logout', function () {
    Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('store.home');
})->name('logout');

Route::namespace('Admin')->middleware(['auth', 'role:admin'])->prefix('apanel')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.home');
    })->name('index');

    Route::get('home', function () {
        return view('admin.home');
    })->name('home');

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('upload', function () {
            return view('admin.products.upload');
        })->name('upload');
        Route::get('stock', function () {
            return view('admin.products.stock');
        })->name('stock');
        Route::post('upload', 'ProductController@upload')->name('upload');
        Route::post('stock', 'ProductController@stock')->name('stock');
        Route::post('images/{product}', 'ProductController@addImage')->name('images.add');
        Route::delete('images/{productImage}', 'ProductController@removeImage')->name('images.remove');
        Route::get('images/{product}', 'ProductController@getImages')->name('images.list');
        Route::get('data', 'ProductController@data')->name('data');
        Route::put('show-in-catalogue/{product}', 'ProductController@showInCatalogueProduct')->name('show-in-catalogue');
    });
    Route::resource('products', 'ProductController');
    Route::resource('tags', 'TagController')->only([
        'index', 'destroy', 'store'
    ]);

    Route::resource('brands', 'BrandController')->only([
        'index', 'destroy', 'store'
    ]);

    Route::resource('sellers', 'SellerController')->only([
        'index', 'destroy', 'store'
    ]);

    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('datatables', 'ClientController@datatables')->name('datatables');
        Route::put('approve/{username}', 'ClientController@approve')->name('approve');
        Route::delete('erase/{username}', 'ClientController@erase')->name('erase');
    });
    Route::resource('clients', 'ClientController');

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('datatables', 'OrderController@datatables')->name('datatables');
        Route::post('modify/{orderProduct}', 'OrderController@modify')->name('modify');
        Route::get('approve/{order}', 'OrderController@approve')->name('approve');
    });
    Route::resource('orders', 'OrderController');

    Route::apiResource('selfadministered', 'SelfAdministeredController')->parameters([
        'selfadministered' => 'selfAdministered'
    ]);

    Route::post('selfadministered/newsletter', 'SelfAdministeredController@sendNewsletter')->name('selfadministered.newsletter');

    Route::prefix('stats')->name('stats.')->group(function () {
        Route::get('salesman', 'StatsController@salesman')->name('salesman');
        Route::get('salesman/data', 'StatsController@salesman_data')->name('salesman.data');
        Route::get('clients', 'StatsController@clients')->name('clients');
        Route::get('clients/data', 'StatsController@clients_data')->name('clients.data');
        Route::get('products', 'StatsController@products')->name('products');
        Route::get('products/data', 'StatsController@products_data')->name('products.data');
    });


});

Route::namespace('Store')->prefix('store')->name('store.')->group(function () {
    Route::get('catalogue', 'StoreController@catalogue')->name('catalogue');
    Route::get('contact', 'StoreController@contact')->name('contact');
    Route::post('contact', 'StoreController@send_contact')->name('send_contact');
    Route::get('faq', 'StoreController@faq')->name('faq');
    Route::get('shipping', 'StoreController@shipping')->name('shipping');
    Route::get('privacy', 'StoreController@privacy')->name('privacy');
    Route::get('terms', 'StoreController@terms')->name('terms');
    Route::get('about-us', 'StoreController@about')->name('about');
    Route::post('subscribe', 'StoreController@subscribe')->name('subscribe');
    Route::get('product/{product}', 'StoreController@product')->name('product');
    Route::get('register', 'StoreController@register')->name('register');
    Route::get('login', 'StoreController@login')->name('login');
    Route::get('cart/add/{product}', 'StoreController@add')->name('cart.add');
    Route::get('cart/size/{orderProduct}/{product}', 'StoreController@change_size')->name('cart.size');
    Route::get('cart/special/{orderProduct}/{size}/{quantity}', 'StoreController@toggle_special')->name('cart.special');
    Route::get('cart/quantity/{orderProduct}', 'StoreController@quantity')->middleware(['auth'])->name('cart.quantity');
    Route::get('cart/remove/{orderProduct}', 'StoreController@remove')->middleware(['auth'])->name('cart.remove');
    Route::post('cart/order', 'StoreController@order')->middleware(['auth'])->name('cart.order');
    Route::get('cart', 'StoreController@cart')->name('cart');
    Route::get('cart/success', 'StoreController@successful_order')->name('cart.success');

    
    Route::get('blank', 'StoreController@blank')->name('blank');
});

Route::middleware(['auth', 'role:client'])->resource('clients', 'Client\ClientController')->except(['store', 'create']);
Route::resource('clients', 'Client\ClientController')->only(['store']);

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');