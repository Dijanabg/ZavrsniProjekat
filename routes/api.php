<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;

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
Route::middleware(['auth:sanctum', 'isApiAdmin'])->group(function () {
    Route::get('/checkingAuthenticated', function() {
        return response()->json(['message'=>'You are in', 'status=>200'], 200);
    });
    Route::resource('category', CategoryApiController::class)->only(['update', 'store', 'destroy']);
    Route::resource('products', ProductApiController::class)->only(['update', 'store', 'destroy']);
    Route::resource('orders', OrderApiController::class)->only(['update']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::resource('cart', CartApiController::class)->only(['index', 'show', 'store', 'destroy']);
    Route::resource('orders', OrderApiController::class)->only(['index', 'show', 'store']);
});
    
    
    // Route::post('/logout', [AuthController::class, 'logout']);

    
    //     Route::resource('products', CategoryApiController::class)->only(['update', 'store', 'destroy']);
    //     Route::resource('products', ProductApiController::class)->only(['update', 'store', 'destroy']);
    // });

