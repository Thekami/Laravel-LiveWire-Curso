<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect()->route('home');
    // return view('/');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/propiedades', [HomeController::class, 'propiedades'])->name('propiedades');
Route::get('/actions', [HomeController::class, 'actions'])->name('actions');
Route::get('/magic-actions', [HomeController::class, 'magicActions'])->name('actions2');
Route::get('/componentes-anidados', [HomeController::class, 'componentesAnidados'])->name('anidados');
Route::get('/eventos', [HomeController::class, 'eventos'])->name('eventos');

Route::get('/producto', App\Http\Livewire\Producto\Index::class)->name('producto');
Route::get('/producto/index', App\Http\Livewire\Producto\Index::class)->name('producto.index');
Route::get('/producto/create', App\Http\Livewire\Producto\create::class)->name('producto.create');

Route::get('/file', App\Http\Livewire\File\Index::class)->name('file');
Route::get('/file/index', App\Http\Livewire\File\Index::class)->name('file.index');
Route::get('/file/create', App\Http\Livewire\File\create::class)->name('file.create');

Route::get('/empleado', App\Http\Livewire\Empleado\Index::class)->name('empleado');
Route::get('/empleado/index', App\Http\Livewire\Empleado\Index::class)->name('empleado.index');
Route::get('/empleado/create', App\Http\Livewire\Empleado\create::class)->name('empleado.create');
Route::get('/empleado/{empleado}/edit', \App\Http\Livewire\Empleado\Edit::class)->name('empleado.edit');
