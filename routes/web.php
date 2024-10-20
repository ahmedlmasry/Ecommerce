<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('products', [MainController::class, 'products']);
Route::get('product/{id}', [MainController::class, 'singleProduct']);
Route::get('product-details/{id}', [MainController::class, 'productDetails']);

Route::get('client/register', [AuthController::class, 'register']);
Route::post('client/post-register', [AuthController::class, 'postRegister']);
Route::get('client/login', [AuthController::class, 'login']);
Route::post('client/post-login', [AuthController::class, 'postLogin']);
Route::get('client/log-out', [AuthController::class, 'logOut']);

Route::get('posts', [MainController::class, 'posts']);
Route::get('post/{id}', [MainController::class, 'postDetails']);

Route::get('contact-us', [MainController::class, 'contact']);
Route::get('contact-post', [MainController::class, 'submitContact']);

Route::get('about', [MainController::class, 'about']);

Route::group([ 'namespace'=>'Front', 'middleware' => 'auth:client-web'], function () {
    Route::post('add-comment', [MainController::class, 'addComment']);
    Route::get('cart/add/{id}', [MainController::class, 'addToCart']);
    Route::get('remove-cart/{id}', [MainController::class, 'removeCart']);
    Route::get('update-cart/{id}', [MainController::class, 'updateCart']);
    Route::get('carts', [MainController::class, 'carts'])->name('carts');
    Route::get('checkout', [MainController::class, 'checkout']);
    Route::post('create-order', [MainController::class, 'createOrder']);
    Route::get('my-orders', [MainController::class, 'myOrders']);

});


Auth::routes(['register' => false]);
Route::group([ 'middleware' => ['auth:web','auto-check-permission'],'prefix' => 'admin'], function () {
    Route::get('/home', [ChartController::class, 'index']);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('settings', SettingController::class);

    Route::resource('clients', ClientController::class);
    Route::get('/clients/activate/{id}', [ClientController::class, 'activate'])->name('clients.activate');
    Route::get('/clients/de-activate/{id}', [ClientController::class, 'deActivate'])->name('clients.de-activate');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('change-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('update-password');
    Route::get('logout', [UserController::class, 'logout']);

});

