<?php

use App\Http\Controllers\imoController;
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

Route::get('/', [imoController::class,'index'])->name('/');
Route::get('/lang/{locale}', [imoController::class,'setLocale'])->name('/lang');

Route::get('/manage-option', [imoController::class,'manageoptions'])->name('/manage-option');
Route::post('/manage-option', [imoController::class,'storeoptions'])->name('/manage-option');

Route::get('/delete/{id}', [imoController::class,'delete'])->name('/delete');
Route::post('/update/{id}', [imoController::class,'update'])->name('/update');

Route::get('/addBiens', [imoController::class,'addBiens'])->name('/addBiens');
Route::post('/addBiens', [imoController::class,'storebiens'])->name('/addBiens');
Route::get('/deletebien/{id}', [imoController::class,'deletebien'])->name('/deletebien');
Route::get('/updatebien/{id}', [imoController::class,'updatebien'])->name('/updatebien');
Route::post('/updatebien/{id}', [imoController::class,'storeupdatebien'])->name('/updatebien');

Route::get('/delImg/{id}', [imoController::class,'delImg'])->name('/delImg');

Route::get('/ourpropertie', [imoController::class,'ourpropertie'])->name('/ourpropertie');

Route::get('/getBien/{id}', [imoController::class,'getBien'])->name('/getBien');
Route::post('/getBien/{id}', [imoController::class,'sendSms'])->name('/getBien');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
