<?php

use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Order_extra_ingredientController;
use App\Http\Controllers\Pizza_raw_materialController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Raw_materialController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/* Ejemplo para uso de rutas

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

*/

//order_extra_ingredient

Route::get('/order_extra_ingredients', [Order_extra_ingredientController::class, 'index'])->name('order_extra_ingredients.index');
Route::post('/order_extra_ingredients', [Order_extra_ingredientController::class, 'store'])->name('order_extra_ingredients.store');
Route::get('/order_extra_ingredients/create', [Order_extra_ingredientController::class, 'create'])->name('order_extra_ingredients.create');
Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [Order_extra_ingredientController::class, 'destroy'])->name('order_extra_ingredients.destroy');
Route::put('/order_extra_ingredients/{order_extra_ingredient}', [Order_extra_ingredientController::class, 'update'])->name('order_extra_ingredients.update');
Route::get('/order_extra_ingredients/{order_extra_ingredient}/edit', [Order_extra_ingredientController::class, 'edit'])->name('order_extra_ingredients.edit');

// branches

Route::get('/branches', [BrancheController::class, 'index'])->name('branches.index');
Route::post('/branches', [BrancheController::class, 'store'])->name('branches.store');
Route::get('/branches/create', [BrancheController::class, 'create'])->name('branches.create');
Route::delete('/branches/{branche}', [BrancheController::class, 'destroy'])->name('branches.destroy');
Route::put('/branches/{branche}', [BrancheController::class, 'update'])->name('branches.update');
Route::get('/branches/{branche}/edit', [BrancheController::class, 'edit'])->name('branches.edit');

// suppliers

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');

require __DIR__.'/auth.php';
