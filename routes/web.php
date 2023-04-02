<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Frontend\ContactController;
 use App\Http\Controllers\Frontend\FrontendController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/categories', [FrontendController::class, 'category'])->name('categories');
Route::post('/categories/{id}', [FrontendController::class, 'category'])->name('categories.one');
Route::get('/productsbycat/{id}',[FrontendController::class, 'catProducts'])->name('frontend.catprods'); 
Route::post('/productsbycat/{id}',[FrontendController::class, 'catProducts'])->name('frontend.catprod'); 
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/{id}', [ProductController::class, 'addToCart'])->name('product.tocart');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
//Route::get('/contact', [ContactController::class, 'search'])->name('search');


Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('users.cart.index');
    Route::delete('/cart', [CartController::class, 'destroy'])->name('users.cart.delete');

    Route::get('/check', [CheckoutController::class, 'index']);
    Route::post('/check', [CheckoutController::class, 'placeorder']);
    Route::get('/userorders', [OrderController::class, 'index'])->name('userorders.index');

    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/dashboard', function(){ return view('admin.index'); });
        Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories'); //prikaz svih kategorija
        Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create'); //forma za unos nove kategorije
        Route::post('/admin/categories/create', [CategoriesController::class, 'store'])->name('categories.store'); //cuva novu kategoriju u bazu
        Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit'); //forma za izmenu podataka odredjene kategorije
        Route::put('/admin/categories/{id}/edit', [CategoriesController::class, 'update'])->name('categories.update'); //menja podatke u bazi
        Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy'); //brise kategoriju iz baze
    
        Route::get('/admin/product',[ProductController::class, 'index'])->name('product.index'); 
        Route::get('/admin/product/create',[ProductController::class, 'create'])->name('product.create'); 
        Route::post('/admin/product/create',[ProductController::class, 'store'])->name('product.store'); 
        Route::get('/admin/product/{id}/edit',[ProductController::class, 'edit'])->name('product.edit'); 
        Route::put('/admin/product/{id}/edit',[ProductController::class, 'update'])->name('product.update'); 
        Route::delete('/admin/product/{id}',[ProductController::class, 'destroy'])->name('product.destroy'); 

        Route::get('/admin/store',[StoreController::class, 'index'])->name('store.index'); 
        Route::get('/admin/store/create',[StoreController::class, 'create'])->name('store.create');
        Route::post('/admin/store/create',[StoreController::class, 'store'])->name('store.store'); 
        Route::get('/admin/store/{id}/edit',[StoreController::class, 'edit'])->name('store.edit'); 
        Route::put('/admin/store/{id}/edit',[StoreController::class, 'update'])->name('store.update'); 
        Route::delete('/admin/store/{id}',[StoreController::class, 'destroy'])->name('store.destroy'); 

        Route::get('/admin/order',[OrderAdminController::class, 'index'])->name('order.index'); 
        //Route::get('/admin/order/show', [OrderAdminController::class, 'show'])->name('order.show');
        Route::get('/admin/order/{id}/edit',[OrderAdminController::class, 'edit'])->name('order.edit'); 
        Route::put('/admin/order/{id}/edit',[OrderAdminController::class, 'update'])->name('order.update'); 
        Route::delete('/admin/order/{id}',[OrderAdminController::class, 'destroy'])->name('order.destroy'); 
    });
});



require __DIR__.'/auth.php';
//grupisanje ruta Route::prefix('categories')->group(function(){sve rute koje pocinju isto i brisemo u rutama..});
