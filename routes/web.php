<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FrontPropertyListController;

// AUTHENTICATION ROUTES
Auth::routes();
// /login => /home (both admin and user)
Route::get('/home', [HomeController::class, 'index'])->name('home');// auth protected user and admin dashboard

// USER ROUTES
Route::get('/', [FrontPropertyListController::class, 'index']);// list all properties
Route::get('/property/{id}', [FrontPropertyListController::class, 'show'])->name('frontproperty.show');
Route::get('/search', [SearchController::class, 'search'])
  ->name('search');
Route::post('like/{property}', [LikesController::class, 'store']);

// ADMIN DASHBOARD ROUTES
Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });
  Route::resource('category', CategoryController::class);
  Route::resource('property', PropertyController::class);
  Route::get('users',[UserController::class, 'index'])->name('user.index');

});

Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function(){
    route::get('/seller',function(){
        return view('Seller.Seller');
    });
    Route::get('users',[UserController::class, 'sell'])->name('user.sell');
});
