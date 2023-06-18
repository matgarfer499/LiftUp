<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\WishlistController;
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
Route::get('/', [ClothesController::class, 'home']);
    //ver ropas
    Route::get('/clothes/{gender}', [ClothesController::class, 'clothes'])->name('clothes.index');
    //buscar ropas
    Route::get('/clothes/{gender}/{search}', [ClothesController::class, 'search'])->name('search.index');
    //Filtrado y ordenamiento
    Route::get('/filter/{gender}/{sort}', [ClothesController::class, 'sortFilter'])->name('sortFilter.index');
    //ver ropa especifica al clickar en la imagen
    Route::get('/clothing/{id}', [ClothesController::class, 'view'])->name('images.see');
    //Ver ropa marcada como "me gusta"
    Route::get('/wishlist/{idUse}', [WishlistController::class, 'viewLikes'])->name('wishlist.index');

Route::middleware('auth')->group(function () {
    //Profile options
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'upload'])->name('profile.uploadPhoto');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Añadir o eliminar ropa de la wishlist
    Route::post('/wishlist/add', [WishlistController::class, 'addRemoveToWishlist'])->name('wishlist.add');
    //Eliminar ropa del carrito
    Route::post('/clothes/bag/delete', [ClothesController::class, 'deleteBag'])->name('bag.delete');
});

require __DIR__.'/auth.php'; //NO TOCAR SIN SABER QUE HAGO
