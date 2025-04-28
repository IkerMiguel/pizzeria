<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\Extra_ingredientController;
use App\Http\Controllers\Order_extra_ingredientController;
use App\Http\Controllers\Order_pizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Pizza_ingredientController;
use App\Http\Controllers\Pizza_raw_materialController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Raw_materialController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\Pizzas_sizeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
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

//Ingredient

Route::middleware('auth')->group(function () {
    Route::get('ingredients', [IngredientController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('ingredients.index');

    Route::post('/ingredients', [IngredientController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('ingredients.store');


*/
Route::middleware('auth')->group(function () {
//Ingredient

    Route::get('/ingredients/create', [IngredientController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('ingredients.create');

    Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('ingredients.destroy');


    Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('ingredients.update');

    Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('ingredients.edit');
});

//Pizza_ingredient

Route::middleware('auth')->group(function () {
    Route::get('/pizza_ingredients', [Pizza_ingredientController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizza_ingredients.index');

    Route::post('/pizza_ingredients', [Pizza_ingredientController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizza_ingredients.store');

    Route::get('/pizza_ingredients/create', [Pizza_ingredientController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizza_ingredients.create');

    Route::delete('/pizza_ingredients/{pizza_ingredient}', [Pizza_ingredientController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('pizza_ingredients.destroy');

    Route::put('/pizza_ingredients/{pizza_ingredient}', [Pizza_ingredientController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizza_ingredients.update');

    Route::get('/pizza_ingredients/{pizza_ingredient}/edit', [Pizza_ingredientController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizza_ingredients.edit');
});


//Extra ingredient

Route::middleware('auth')->group(function () {
    Route::get('/extra_ingredients', [Extra_ingredientController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cocinero,cajero')->name('extra_ingredients.index');

    Route::post('/extra_ingredients', [Extra_ingredientController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('extra_ingredients.store');

    Route::get('/extra_ingredients/create', [Extra_ingredientController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('extra_ingredients.create');

    Route::delete('/extra_ingredients/{extra_ingredient}', [Extra_ingredientController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('extra_ingredients.destroy');

    Route::put('/extra_ingredients/{extra_ingredient}', [Extra_ingredientController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('extra_ingredients.update');

    Route::get('/extra_ingredients/{extra_ingredient}/edit', [Extra_ingredientController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('extra_ingredients.edit');
});

//Order

Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero,cocinero,mensajero,cliente')->name('orders.index');

    Route::post('/orders', [OrderController::class, 'store'])
        ->middleware(CheckRole::class . ':cliente,cajero')->name('orders.store');

    Route::get('/orders/create', [OrderController::class, 'create'])
        ->middleware(CheckRole::class . ':cliente,cajero')->name('orders.create');

    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('orders.destroy');

    Route::put('/orders/{order}', [OrderController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('orders.update');

    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('orders.edit');
});

//order pizza

Route::middleware('auth')->group(function () {
    Route::get('/orders_pizza', [Order_pizzaController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero,cocinero')->name('orders_pizza.index');

    Route::post('/orders_pizza', [Order_pizzaController::class, 'store'])
        ->middleware(CheckRole::class . ':cajero')->name('orders_pizza.store');

    Route::get('/orders_pizza/create', [Order_pizzaController::class, 'create'])
        ->middleware(CheckRole::class . ':cajero')->name('orders_pizza.create');

    Route::delete('/orders_pizza/{order_pizza}', [Order_pizzaController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('orders_pizza.destroy');

    Route::put('/orders_pizza/{order_pizza}', [Order_pizzaController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('orders_pizza.update');

    Route::get('/orders_pizza/{order_pizza}/edit', [Order_pizzaController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('orders_pizza.edit');
});

//order_extra_ingredient

Route::middleware('auth')->group(function () {
    Route::get('/order_extra_ingredients', [Order_extra_ingredientController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero,cocinero')->name('order_extra_ingredients.index');

    Route::post('/order_extra_ingredients', [Order_extra_ingredientController::class, 'store'])
        ->middleware(CheckRole::class . ':cajero')->name('order_extra_ingredients.store');

    Route::get('/order_extra_ingredients/create', [Order_extra_ingredientController::class, 'create'])
        ->middleware(CheckRole::class . ':cajero')->name('order_extra_ingredients.create');

    Route::delete('/order_extra_ingredients/{order_extra_ingredient}', [Order_extra_ingredientController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('order_extra_ingredients.destroy');

    Route::put('/order_extra_ingredients/{order_extra_ingredient}', [Order_extra_ingredientController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('order_extra_ingredients.update');

    Route::get('/order_extra_ingredients/{order_extra_ingredient}/edit', [Order_extra_ingredientController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('order_extra_ingredients.edit');
});


// branches

Route::middleware('auth')->group(function () {
    Route::get('/branches', [BrancheController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero,cocinero,mensajero')->name('branches.index');

    Route::post('/branches', [BrancheController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('branches.store');

    Route::get('/branches/create', [BrancheController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('branches.create');

    Route::delete('/branches/{branche}', [BrancheController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('branches.destroy');

    Route::put('/branches/{branche}', [BrancheController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('branches.update');

    Route::get('/branches/{branche}/edit', [BrancheController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('branches.edit');
});

// suppliers

Route::middleware('auth')->group(function () {
    Route::get('/suppliers', [SupplierController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('suppliers.index');

    Route::post('/suppliers', [SupplierController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('suppliers.store');

    Route::get('/suppliers/create', [SupplierController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('suppliers.create');

    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('suppliers.destroy');

    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('suppliers.update');

    Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('suppliers.edit');
});

// raw_materials

Route::middleware('auth')->group(function () {
    Route::get('/raw_materials', [Raw_materialController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('raw_materials.index');

    Route::post('/raw_materials', [Raw_materialController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('raw_materials.store');

    Route::get('/raw_materials/create', [Raw_materialController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('raw_materials.create');

    Route::delete('/raw_materials/{raw_material}', [Raw_materialController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('raw_materials.destroy');

    Route::put('/raw_materials/{raw_material}', [Raw_materialController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('raw_materials.update');

    Route::get('/raw_materials/{raw_material}/edit', [Raw_materialController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('raw_materials.edit');
});

// purchases

Route::middleware('auth')->group(function () {
    Route::get('/purchases', [PurchaseController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador')->name('purchases.index');

    Route::post('/purchases', [PurchaseController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('purchases.store');

    Route::get('/purchases/create', [PurchaseController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('purchases.create');

    Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('purchases.destroy');

    Route::put('/purchases/{purchase}', [PurchaseController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('purchases.update');

    Route::get('/purchases/{purchase}/edit', [PurchaseController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('purchases.edit');
});

// pizza_raw_material

Route::middleware('auth')->group(function () {
    Route::get('/pizza_raw_materials', [Pizza_raw_materialController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizza_raw_materials.index');

    Route::post('/pizza_raw_materials', [Pizza_raw_materialController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('pizza_raw_materials.store');

    Route::get('/pizza_raw_materials/create', [Pizza_raw_materialController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('pizza_raw_materials.create');

    Route::delete('/pizza_raw_materials/{pizza_raw_material}', [Pizza_raw_materialController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('pizza_raw_materials.destroy');

    Route::put('/pizza_raw_materials/{pizza_raw_material}', [Pizza_raw_materialController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('pizza_raw_materials.update');

    Route::get('/pizza_raw_materials/{pizza_raw_material}/edit', [Pizza_raw_materialController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('pizza_raw_materials.edit');
});


// pizzas

Route::middleware('auth')->group(function () {
    Route::get('/pizzas', [PizzasController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero,cocinero,cliente')->name('pizzas.index');

    Route::post('/pizzas', [PizzasController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizzas.store');

    Route::get('/pizzas/create', [PizzasController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizzas.create');

    Route::delete('/pizzas/{pizza}', [PizzasController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('pizzas.destroy');

    Route::put('/pizzas/{pizza}', [PizzasController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizzas.update');

    Route::get('/pizzas/{pizza}/edit', [PizzasController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cocinero')->name('pizzas.edit');
});


//pizzas_sizes
Route::middleware('auth')->group(function () {
    Route::get('/pizzas_sizes', [Pizzas_sizeController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero,cocinero,cliente')->name('pizzas_sizes.index');

    Route::post('/pizzas_sizes', [Pizzas_sizeController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('pizzas_sizes.store');

    Route::get('/pizzas_sizes/create', [Pizzas_sizeController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('pizzas_sizes.create');

    Route::delete('/pizzas_sizes/{pizzas_size}', [Pizzas_sizeController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('pizzas_sizes.destroy');

    Route::put('/pizzas_sizes/{pizzas_size}', [Pizzas_sizeController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('pizzas_sizes.update');

    Route::get('/pizzas_sizes/{pizzas_size}/edit', [Pizzas_sizeController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('pizzas_sizes.edit');
});

// clients
Route::middleware('auth')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador,cajero')->name('clients.index');

    Route::post('/clients', [ClientController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador,cajero,cliente')->name('clients.store');

    Route::get('/clients/create', [ClientController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador,cajero,cliente')->name('clients.create');

    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('clients.destroy');

    Route::put('/clients/{client}', [ClientController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cajero,cliente')->name('clients.update');

    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cajero,cliente')->name('clients.edit');
});

// employees
Route::middleware('auth')->group(function () {
    Route::get('/employees', [EmployeesController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador')->name('employees.index');

    Route::post('/employees', [EmployeesController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador')->name('employees.store');

    Route::get('/employees/create', [EmployeesController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador')->name('employees.create');

    Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('employees.destroy');

    Route::put('/employees/{employee}', [EmployeesController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador')->name('employees.update');

    Route::get('/employees/{employee}/edit', [EmployeesController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador')->name('employees.edit');
});

//User
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])
        ->middleware(CheckRole::class . ':administrador')->name('users.index');

    Route::post('/users', [UserController::class, 'store'])
        ->middleware(CheckRole::class . ':administrador,cliente')->name('users.store');

    Route::get('/users/create', [UserController::class, 'create'])
        ->middleware(CheckRole::class . ':administrador,cliente')->name('users.create');


    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->middleware(CheckRole::class . ':administrador')->name('users.destroy');

    Route::put('/users/{user}', [UserController::class, 'update'])
        ->middleware(CheckRole::class . ':administrador,cliente,empleado')->name('users.update');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->middleware(CheckRole::class . ':administrador,cliente,empleado')->name('users.edit');

});

require __DIR__.'/auth.php';
