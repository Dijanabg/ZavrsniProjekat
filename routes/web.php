<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoriesController;
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
Route::post('/categories/{id}', [FrontendController::class, 'category'])->name('categories');
Route::get('/productsbycat/{id}',[FrontendController::class, 'catProducts'])->name('frontend.catprods'); 
Route::post('/productsbycat/{id}',[FrontendController::class, 'catProducts'])->name('frontend.catprod'); 
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); //prikaz jedne kategorij

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('/dashboard', function(){ return view('admin.index'); });
        Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('categories.index'); //prikaz svih kategorija
        Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('categories.create'); //forma za unos nove kategorije
        Route::post('/admin/categories/create', [CategoriesController::class, 'store'])->name('categories.store'); //cuva novu kategoriju u bazu
        Route::get('/admin/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show'); //prikaz jedne kategorije
        Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit'); //forma za izmenu podataka odredjene kategorije
        Route::put('/admin/categories/{id}/edit', [CategoriesController::class, 'update'])->name('categories.update'); //menja podatke u bazi
        Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy'); //brise kategoriju iz baze
    
        Route::get('/admin/product',[ProductController::class, 'index'])->name('product.index'); //prikaz svih kategorija
        Route::get('/admin/product/create',[ProductController::class, 'create'])->name('product.create'); //forma za unos nove kategorije
        Route::post('/admin/product/create',[ProductController::class, 'store'])->name('product.store'); //cuva novu kategoriju u bazu
        
        Route::get('/admin/product/{id}/edit',[ProductController::class, 'edit'])->name('product.edit'); //forma za izmenu podataka odredjene kategorije
        Route::put('/admin/product/{id}/edit',[ProductController::class, 'update'])->name('product.update'); //menja podatke u bazi
        Route::delete('/admin/product/{id}',[ProductController::class, 'destroy'])->name('product.destroy'); //brise kategoriju iz baze
    });
});



require __DIR__.'/auth.php';
//grupisanje ruta Route::prefix('categories')->group(function(){sve rute koje pocinju isto i brisemo u rutama..});
