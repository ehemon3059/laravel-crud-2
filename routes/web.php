<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/products.create', [ProductController::class, 'create'])->name('products.create');

Route::POST('/products.store', [ProductController::class, 'store'])->name('products.store');


Route::get('products/{id}/edit', [ProductController::class, 'editProduct'])->name('products.edit');

Route::put('/products/{id}/update', [ProductController::class, 'updateProduct'])->name('product.update');

// delete by get method
// Route::get('products/{id}/delete', [ProductController::class, 'destroy']);

Route::delete('products/{id}/delete', [ProductController::class, 'destroy']);

Route::get('/products/{id}/show', [ProductController::class, 'show']);
