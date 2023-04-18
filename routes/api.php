<?php


use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;



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

// Route::post('register', [AuthController::class, 'register']);

// Autentificacion api
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('post', PostController::class)->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->group(function(){
    
    // CRUD Proveedor
    Route::resource('/productos',ProductoController::class);

    // CREATE
        Route::post('products', 'ProductController@store'); // Crear un nuevo producto

    // READ
        Route::get('products', 'ProductController@index'); // Listar todos los productos
        Route::get('products/{id}', 'ProductController@show'); // Mostrar un producto específico
        
    // UPDATE
        Route::put('products/{id}', 'ProductController@update'); // Actualizar un producto
        
    // DELETE
        Route::delete('products/{id}', 'ProductController@destroy'); // Eliminar un producto
        

});









