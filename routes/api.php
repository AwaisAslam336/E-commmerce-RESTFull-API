<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::get('/user/products/{user}',[ProductController::class,'UserProductShow'])->name('user.products.show');
Route::apiResource('/products',ProductController::class);

Route::prefix('products')->group(function(){
    Route::apiResource('/{product}/reviews',ReviewController::class);
});