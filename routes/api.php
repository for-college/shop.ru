<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth:api')->group(function () {
  // Пользователи
  Route::get('/logout', [UserController::class, 'logout']);
  Route::get('/users', [UserController::class, 'index']);
  Route::post('/users', [UserController::class, 'create']);
  Route::get('/users/{id}', [UserController::class, 'show']);
  Route::patch('/users/{id}', [UserController::class, 'update']);
  Route::delete('/users/{id}', [UserController::class, 'destroy']);
  // Роли
  Route::get('/roles', [RoleController::class, 'index']);
  Route::post('/roles', [RoleController::class, 'create']);
  Route::get('/roles/{id}', [RoleController::class, 'show']);
  Route::patch('/roles/{id}', [RoleController::class, 'update']);
  Route::delete('/roles/{id}', [RoleController::class, 'destroy']);
  // Категории
  Route::get('/categories', [CategoryController::class, 'index']);
  Route::post('/categories', [CategoryController::class, 'create']);
  Route::get('/categories/{id}', [CategoryController::class, 'show']);
  Route::patch('/categories/{id}', [CategoryController::class, 'update']);
  Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
  // Продукты
  Route::get('/products', [ProductController::class, 'index']);
  Route::post('/products', [ProductController::class, 'create']);
  Route::get('/products/{id}', [ProductController::class, 'show']);
  Route::patch('/products/{id}', [ProductController::class, 'update']);
  Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});
