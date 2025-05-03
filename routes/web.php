<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\UserAuth;

Route::get("/login", function(){
    return view('login');
})->middleware(UserAuth::class);

Route::post("/login", [UserController::class,'login']);
Route::get("/logout", [UserController::class,'logout']);

Route::middleware([UserAuth::class])->group(function () {
    Route::get("/product", [ProductController::class,'index']);
    Route::get("detail/{id}",[ProductController::class,'detail']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::post('/add_to_cart', [ProductController::class, 'add_to_cart']);
});
