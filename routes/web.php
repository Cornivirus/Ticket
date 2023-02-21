<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Http;
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


Route::get ('/', [App\Http\Controllers\TicketController::class, 'index']);
Route::get ('/tickets', [App\Http\Controllers\TicketController::class, 'index']);
Route::post ('/editar' , [App\Http\Controllers\TicketController::class, 'editar'])->name('ticket.editar');
Route::get ('/ticket' , [App\Http\Controllers\TicketController::class, 'create'])->name('ticket');
Route::post('/ticket' , [App\Http\Controllers\TicketController::class, 'store']) ->name('ticket.store');
Route::post('/delete' , [App\Http\Controllers\TicketController::class, 'delete']) ->name('ticket.delete');
Route::post('/update' , [App\Http\Controllers\TicketController::class, 'update']) ->name('ticket.update');
//Route::get('/', [TicketController::class,'index']);
//Route::get('/', 'TicketController');

