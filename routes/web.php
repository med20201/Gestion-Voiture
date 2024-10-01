<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [indexController::class, 'index',])->name('home');

// Route::get('/', [CarController::class, 'getCar',])->name('home');
// Route::get('/', [CarController::class, 'featuredCar']);

Route::resource('car', CarController::class);
Route::get('car/type/{type}', [CarController::class, 'carType'])->name('carType');
// Route::get('car/type/{type}',[CarController::class,'carEssence'])->name('carEssence');
Route::get('car/vitesse/{vitesse}',[CarController::class,'carVitesse'])->name('carVitesse');
// Route::get('car',[CarController::class,'carAutomatique'])->name('carAutomatique');
// Route::get('car',[CarController::class,'carEssence'])->name('carEssence');




Route::resource('user', UserController::class);
Route::resource('commande', CommandeController::class);
Route::get('/car/{id}/create', [CommandeController::class, 'create'])->name('command.craete');


Route::get('/admin',[AdminsController::class,'index'])->name('admin');
Route::get('/admin/create',[AdminsController::class,'create'])->name('add.Admin');
Route::post('/admin/create',[AdminsController::class,'addAdmin'])->name('add.Admin');

Route::get('/admin/users',[UserController::class,'index'])->name('admin.index');
Route::get('/admin/cars',[CarController::class,'carAdmin'])->name('car.admin');
Route::get('/admin/commands',[CommandeController::class,'index'])->name('command.admin');
Route::delete('/admin/commands/{$id}',[AdminsController::class,'destroy'])->name('command.del');
Route::post('/admin/commands/accept/{command}',[CommandeController::class,'acceptCmd'])->name('command.acceptCmd');
Route::post('/admin/commands/termin/{command}',[CommandeController::class,'termineCmd'])->name('command.termineCmd');

// Route::resource('admin', AdminsController::class);


Route::resource('commentaire',CommentaireController::class);



Route::get('/login', [UserController::class, 'login',])->name('login');
Route::post('/create', [UserController::class, 'auth',])->name('auth');
Route::post('/logout', [UserController::class, 'logout',])->name('logout');
Route::post('/create', [UserController::class, 'auth',])->name('auth');
