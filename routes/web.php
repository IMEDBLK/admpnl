<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutoEcoleController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\UserController;

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
})->middleware('auth')->name('dashbord');




Route::get('profil/edit', [DashboardController::class, 'editProfile'])->name('dashboard.edit-profile');
Route::put('profil/update', [DashboardController::class, 'updateProfile'])->name('dashboard.update-profile');






//routes de la gestion des packs
 Route::get('/packs', [PackController::class, 'index'])->name('packs.index')->middleware('auth');
 Route::get('/packs/create', [PackController::class, 'create'])->name('packs.create')->middleware('auth');
 Route::post('/packs', [PackController::class, 'store'])->name('packs.store')->middleware('auth');

 Route::get('/packs/{pack}/edit', [PackController::class, 'edit'])->name('packs.edit')->middleware('auth');

 Route::put('/packs/{pack}', [PackController::class, 'update'])->name('packs.update')->middleware('auth');


Route::delete('/packs/{pack}', [PackController::class, 'destroy'])->name('packs.destroy')->middleware('auth');


//routes auto ecole
Route::get('/autoecoles/{page?}/{perPage?}', [AutoecoleController::class, 'index'])->where(['page' => '[0-9]+', 'perPage' => '[0-9]+'])->name('autoecoles.index')->middleware('auth');

Route::get('/autoecoles/create', [AutoecoleController::class, 'create'])->name('autoecoles.create')->middleware('auth');
Route::post('/autoecoles', [AutoecoleController::class, 'store'])->name('autoecoles.store')->middleware('auth');
Route::get('/autoecoles/{id}', [AutoecoleController::class, 'show'])->name('autoecoles.show')->middleware('auth');
Route::get('/autoecoles/{autoEcole}/edit', [AutoecoleController::class, 'edit'])->name('autoecoles.edit')->middleware('auth');
Route::put('/autoecoles/{autoEcole}', [AutoecoleController::class, 'update'])->name('autoecoles.update')->middleware('auth');


Route::get('/export-autoecoles/{id}', [AutoecoleController::class, 'exportToExcel'])->name('autoecoles.export')->middleware('auth');


Route::delete('/autoecoles/{id}', [AutoecoleController::class, 'destroy'])->name('autoecoles.destroy')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//users
Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::post('/users', [UserController::class,'store'])->name('users.store');

