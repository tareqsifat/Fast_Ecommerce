<?php

use App\Http\Controllers\Api\Categories\CategoryController;
use App\Http\Controllers\Api\Products\AllProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::group(['prefix'=>'v1'],function (){
    route::get('products', [AllProducts::class, 'index']);
    route::get('Category', [CategoryController::class, 'index']);
});
