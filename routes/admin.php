<?php


use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin',
    'as' => 'admin.' 
], function(){
    //Muestra datos basicos de la ropa y opciones de borrar, crear y editar
    Route::get('/datos', [AdminController::class, 'all'])->name('all');
    Route::post('/create', [AdminController::class, 'create'])->name('create');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    Route::put('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    //Muestra las imagenes de cada ropa, creacion y borrado
    Route::get('/imagenes', [AdminController::class, 'images'])->name('images');
    Route::post('/create/img', [AdminController::class, 'createImg'])->name('uploadImg');
    Route::delete('/delete/img/{idImg}', [AdminController::class, 'deleteImg'])->name('deleteImg');
    //Muestra los colores y tallas de la ropa, ademas de poder añadir o eliminarlas
    Route::get('/sizesColors', [AdminController::class, 'sizesColors'])->name('sizesColors');
    Route::get('/editSizesColors', [AdminController::class, 'editSizesColors'])->name('editSizesColors');
    //Barra de busqueda
    Route::get('/{page?}/{search}', [AdminController::class, 'search'])->name('search.admin');
});

