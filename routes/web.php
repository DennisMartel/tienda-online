<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [App\Http\Controllers\PanelController::class, 'index'])->name('dashboard');

Route::get('departamentos', [App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamentos.index');
Route::post('departamentos', [App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamentos.store');
Route::get('getDepartamentos', [App\Http\Controllers\DepartamentoController::class, 'getDepartamentos'])->name('departamentos.getDepartamentos');
Route::post('deleteDepartamento', [App\Http\Controllers\DepartamentoController::class, 'delete'])->name('departamentos.delete');

Route::get('categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index');
Route::post('categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
Route::get('getCategorias', [App\Http\Controllers\CategoriaController::class, 'getCategorias'])->name('categorias.getCategorias');
Route::post('deleteCategoria', [App\Http\Controllers\CategoriaController::class, 'delete'])->name('categorias.delete');

Route::get('subcategorias', [App\Http\Controllers\SubcategoriaController::class, 'index'])->name('subcategorias.index');
Route::post('subcategorias', [App\Http\Controllers\SubcategoriaController::class, 'store'])->name('subcategorias.store');
Route::get('getSubcategorias', [App\Http\Controllers\SubcategoriaController::class, 'getSubcategorias'])->name('subcategorias.getSubcategorias');
Route::post('deleteSubcategoria', [App\Http\Controllers\SubcategoriaController::class, 'delete'])->name('subcategorias.delete');

Route::get('marcas', [App\Http\Controllers\MarcaController::class, 'index'])->name('marcas.index');
