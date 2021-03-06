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

use App\Http\Controllers\Todo;

Route::get('/', [Todo::class, 'index']);
Route::post('/todos', [Todo::class, 'store']);
Route::put('/todos/{id}', [Todo::class, 'update']);
Route::delete('/todos/{id}', [Todo::class, 'destroy']);
