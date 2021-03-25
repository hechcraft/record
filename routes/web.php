<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/types', [\App\Http\Controllers\UserController::class, 'types'])->name('users.types');
Route::get('/users/types/create', [\App\Http\Controllers\UserController::class, 'typeCreate'])->name('users.types.create');
Route::post('/users/verification', [\App\Http\Controllers\UserController::class, 'verification'])->name('verification');
Route::post('/users/types', [\App\Http\Controllers\UserController::class, 'typeStore'])->name('users.types.store');
Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
Route::delete('/users/types/{id}', [\App\Http\Controllers\UserController::class, 'typeDelete'])->name('users.types.delete');

Route::get('/types', [\App\Http\Controllers\TypesController::class, 'index'])->name('types');
Route::get('/types/create', [\App\Http\Controllers\TypesController::class, 'create'])->name('types.create');
Route::get('/equipments/types/create', [\App\Http\Controllers\TypesController::class, 'equipmentCreate'])->name('equipment.types.create');
Route::get('/part/types/create', [\App\Http\Controllers\TypesController::class, 'partCreate'])->name('part.types.create');
Route::post('/types', [\App\Http\Controllers\TypesController::class, 'store'])->name('types.store');

Route::get('/equipments', [\App\Http\Controllers\ComputerEquipmentController::class,'index'])->name('equipments');
Route::get('/equipments/create', [\App\Http\Controllers\ComputerEquipmentController::class, 'create'])->name('equipments.create');
Route::get('/equipments/{equipment}/edit', [\App\Http\Controllers\ComputerEquipmentController::class, 'edit'])->name('equipments.edit');
Route::put('/equipments/{equipment}', [\App\Http\Controllers\ComputerEquipmentController::class, 'update'])->name('equipments.update');
Route::post('/equipments', [\App\Http\Controllers\ComputerEquipmentController::class, 'store'])->name('equipments.store');
Route::delete('/equipments/{equipment}', [\App\Http\Controllers\ComputerEquipmentController::class, 'delete'])->name('equipments.delete');
Route::get('/equipments/{equipment}', [\App\Http\Controllers\ComputerEquipmentController::class, 'show'])->name('equipments.show');

Route::get('/parts', [\App\Http\Controllers\ComputerPartsController::class, 'index'])->name('parts');
Route::get('/parts/create', [\App\Http\Controllers\ComputerPartsController::class, 'create'])->name('parts.create');
Route::get('/parts/{part}', [\App\Http\Controllers\ComputerPartsController::class, 'show'])->name('parts.show');
Route::post('/parts', [\App\Http\Controllers\ComputerPartsController::class, 'store'])->name('parts.store');
Route::get('/parts/{part}/edit', [\App\Http\Controllers\ComputerPartsController::class, 'edit'])->name('parts.edit');
Route::put('/parts/{part}', [\App\Http\Controllers\ComputerPartsController::class, 'update'])->name('parts.update');
Route::delete('/parts/{part}', [\App\Http\Controllers\ComputerPartsController::class, 'delete'])->name('parts.delete');
