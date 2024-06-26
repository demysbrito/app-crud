<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImagemController;

Route::get('/', function () {
    return view('welcome');
});

//Rotas de produtos
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
// Route::get('/product/generate-pdf', 'App\Http\Controllers\ProductController@generatePDF');
Route::get('/product/generate-pdf', [ProductController::class,'generatePDF'])->name('product.report');


//Rota da captura da imagem pela câmera
Route::get('/imagem', function () {
    return view('camera/index');
})->name('inicio');
Route::post('/salvar-imagem', [ImagemController::class, 'salvarImagem'])->name('salvar.imagem');
Route::get('/imagem/{id}', [ImagemController::class, 'mostrarImagem'])->name('imagem.mostrar');

