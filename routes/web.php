<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClothesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Home page
Route::get('/', function () {
    return view('clothes.home');
});
//ver ropas de hombre
Route::get('/men', [ClothesController::class, 'men'])->name('menclothes.index');
//ver ropas de mujer
Route::get('/women', [ClothesController::class, 'women'])->name('womenclothes.index');
//ver ropa especifica al clickar en la imagen
Route::get('/clothing/{id}', [ClothesController::class, 'view'])->name('images.see');

Route::middleware('auth')->group(function () {
    //Profile options
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; //NO TOCAR SIN SABER QUE HAGO
