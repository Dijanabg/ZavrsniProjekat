<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\API\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/users',[UsersController::class, 'index']);
Route::get('/users/{id}', [UsersController::class, 'show']);
 //Route::resource('users', UsersControllers::class);
//Registracija usera
 Route::post('/register', [AuthController::class, 'register']);
//Login
Route::post('/login', [AuthController::class, 'login']);

 //Route::get('/categories',[CategoryApiController::class, 'index']);
//Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
Route::resource('category', CategoryApiController::class)->only(['index', 'show']);
Route::resource('products', ProductApiController::class)->only(['index', 'show']);
//***********************Route::resource('cart', CartController::class)->only(['index', 'show']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    
    Route::post('/logout', [AuthController::class, 'logout']);

    
        Route::resource('products', CategoryApiController::class)->only(['update', 'store', 'destroy']);
        Route::resource('products', ProductApiController::class)->only(['update', 'store', 'destroy']);
    });

