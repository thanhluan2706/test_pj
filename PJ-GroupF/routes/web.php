<?php

use App\Http\Controllers\Admin\AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Contacts\ContactsController;

// // __________________________________________________ LOGIN, REGISTER __________________________________________________
//
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
// Route::get('/about', 'TestNewsController@index');
// Route::get('/about', [TestNewsController::class, 'index']);

// // __________________________________________________ CRUD TEST __________________________________________________
//
// Route::get('/', [ProductController::class, 'index'])->name('index');
// Route::get('/create', [ProductController::class, 'create'])->name('create');
// Route::post('store/', [ProductController::class, 'store'])->name('store');
// Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
// Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
// Route::put('edit/{product}',[ProductController::class, 'update'])->name('update');
// Route::delete('/{product}',[ProductController::class, 'destroy'])->name('destroy');

// // __________________________________________________ PROJECT __________________________________________________
// //ADMIN
Route::get('/admin', [AdminNewsController::class, 'index'])->name('admin');
Route::get('/admin/create', [AdminNewsController::class, 'create'])->name('create');
Route::post('/admin/store/', [AdminNewsController::class, 'store'])->name('store');
Route::get('/admin/edit/{products}', [AdminNewsController::class, 'edit'])->name('edit');
Route::put('/admin/edit/{products}',[AdminNewsController::class, 'update'])->name('update');
// Route::get('/admin/edit',[AdminNewsController::class, 'test'])->name('test');
Route::delete('/admin/{products}',[AdminNewsController::class, 'destroy'])->name('destroy');
Route::get('/admin/create', [AdminNewsController::class, 'getAllManu'])->name('getAllManu');

//CART
// Route::get('/dashboard', [TestController::class, 'index']);  
// Route::get('/shopping-cart', [TestController::class, 'productCart'])->name('shopping.cart');
// Route::get('/product/{id}', [TestController::class, 'addProductToCart'])->name('addbook.to.cart');
// Route::patch('/update-shopping-cart', [TestController::class, 'updateCart'])->name('update.sopping.cart');
// Route::delete('/delete-cart-product', [TestController::class, 'deleteProduct'])->name('delete.cart.product');
//
// Route::get('/dashboard', [TestController::class, 'index']);
// Route::get('cart', [TestController::class, 'cart'])->name('cart');
// Route::get('add-to-cart/{id}', [TestController::class, 'addToCart'])->name('add_to_cart');
// Route::patch('update-cart', [TestController::class, 'updateCart'])->name('update_cart');
// Route::delete('remove-from-cart', [TestController::class, 'removeProduct'])->name('remove_from_cart');

// //INDEX
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('aboutUs');
//CART
Route::get('cart', [IndexController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [IndexController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [IndexController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [IndexController::class, 'removeProduct'])->name('remove_from_cart');
//WishList
Route::get('wish', [IndexController::class, 'wish'])->name('wish');
Route::get('add-to-wish/{id}', [IndexController::class, 'addToWishList'])->name('add_to_wish');
Route::patch('update-wish', [IndexController::class, 'updateWishList'])->name('update_wish');
Route::delete('remove-from-wish', [IndexController::class, 'removeWishList'])->name('remove_from_wish');
//Contact Us
Route::get('contact-us', [ContactsController::class, 'index'])->name('contact');
Route::post('contact-us', [ContactsController::class, 'store'])->name('contact-us');