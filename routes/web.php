<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Order_extra_ingredientController;
use App\Http\Controllers\Pizza_raw_materialController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Raw_materialController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzasController; 
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

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

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

// raw_materials

Route::get('/raw_materials', [Raw_materialController::class, 'index'])->name('raw_materials.index');
Route::post('/raw_materials', [Raw_materialController::class, 'store'])->name('raw_materials.store');
Route::get('/raw_materials/create', [Raw_materialController::class, 'create'])->name('raw_materials.create');
Route::delete('/raw_materials/{raw_material}', [Raw_materialController::class, 'destroy'])->name('raw_materials.destroy');
Route::put('/raw_materials/{raw_material}', [Raw_materialController::class, 'update'])->name('raw_materials.update');
Route::get('/raw_materials/{raw_material}/edit', [Raw_materialController::class, 'edit'])->name('raw_materials.edit');

// purchases

Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('/purchases/create', [PurchaseController::class, 'create'])->name('purchases.create');
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');
Route::put('/purchases/{purchase}', [PurchaseController::class, 'update'])->name('purchases.update');
Route::get('/purchases/{purchase}/edit', [PurchaseController::class, 'edit'])->name('purchases.edit');

// pizza_raw_material

Route::get('/pizza_raw_materials', [Pizza_raw_materialController::class, 'index'])->name('pizza_raw_materials.index');
Route::post('/pizza_raw_materials', [Pizza_raw_materialController::class, 'store'])->name('pizza_raw_materials.store');
Route::get('/pizza_raw_materials/create', [Pizza_raw_materialController::class, 'create'])->name('pizza_raw_materials.create');
Route::delete('/pizza_raw_materials/{pizza_raw_material}', [Pizza_raw_materialController::class, 'destroy'])->name('pizza_raw_materials.destroy');
Route::put('/pizza_raw_materials/{pizza_raw_material}', [Pizza_raw_materialController::class, 'update'])->name('pizza_raw_materials.update');
Route::get('/pizza_raw_materials/{pizza_raw_material}/edit', [Pizza_raw_materialController::class, 'edit'])->name('pizza_raw_materials.edit');

// pizzas

Route::get('/pizzas', [PizzasController::class, 'index'])->name('pizzas.index');
Route::post('/pizzas', [PizzasController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/create', [PizzasController::class, 'create'])->name('pizzas.create');


require __DIR__.'/auth.php';
