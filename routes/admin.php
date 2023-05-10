<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\TypeprocedureController;
use App\Http\Controllers\Admin\ProcedureController;
use App\Http\Controllers\Admin\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estos
| las rutas son cargadas por el RouteServiceProvider y todas ellas
| asignarse al grupo de middleware "web". ¡Haz algo genial!
|
*/

Route::get('/', function() { return view('admin.dashboard'); })->name('dashboard');
Route::get('/dashboard', function() { return view('admin.dashboard.index'); })->middleware('can:admin.dashboard')->name('dashboard');
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('requirements', RequirementController::class);
Route::resource('areas', AreaController::class);
Route::resource('typeprocedures', TypeprocedureController::class);
Route::resource('procedures', ProcedureController::class);
Route::resource('customers', CustomerController::class);
