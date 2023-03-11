<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/admin/categories',[CategoriesController::class, 'index']); //prikaz svih kategorija
Route::get('/admin/categories/{id}',[CategoriesController::class, 'show']); //prikaz jedne kategorije
Route::get('/admin/categories/add',[CategoriesController::class, 'create']); //forma za unos nove kategorije
Route::post('/admin/categories/add',[CategoriesController::class, 'store']); //cuva novu kategoriju u bazu
Route::get('/admin/categories/{id}/edit',[CategoriesController::class, 'edit']); //forma za izmenu podataka odredjene kategorije
Route::put('/admin/categories/{id}/edit}',[CategoriesController::class, 'update']); //menja podatke u bazi
Route::delete('/admin/categories/{id}}',[CategoriesController::class, 'destroy']); //brise kategoriju iz baze
