<?php


use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProviderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) { return $request->user(); });


// Autentificacion api
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Pio toni
Route::resource('post', PostController::class)->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->group(function(){
    // CRUD Product
        // CREATE
            Route::post('products', [ProductController::class, 'store']); // Crear un nuevo producto

        // READ
            Route::get('products', [ProductController::class, 'index']); // Listar todos los productos
            Route::get('products/{id}', [ProductController::class, 'show']); // Mostrar un producto específico
            
        // UPDATE
            Route::put('products/{id}', [ProductController::class, 'update']); // Actualizar un producto
            
        // DELETE
            Route::delete('products/{id}', [ProductController::class, 'destroy']); // Eliminar un producto

    // CRUD Proveedor
        // CREATE
            Route::post('providers', [ProviderController::class, 'store']); // Crear un nuevo proveedor

        // READ
            Route::get('providers', [ProviderController::class, 'index']); // Listar todos los proveedores
            Route::get('providers/{id}', [ProviderController::class, 'show']); // Mostrar un proveedor específico
            
        // UPDATE
            Route::put('providers/{id}', [ProviderController::class, 'update']); // Actualizar un proveedor
            
        // DELETE
            Route::delete('providers/{id}', [ProviderController::class, 'destroy']); // Eliminar un proveedor

});









