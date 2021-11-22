<?php

use App\Http\Controllers\ResturantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('resturant',[ResturantController::class,'index']);