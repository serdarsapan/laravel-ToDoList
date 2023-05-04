<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExistingController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\CreateController;
use App\Models\Task;


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

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [ExistingController::class, 'show']);
});

Route::post('/task', [ValidationController::class, 'add']);

Route::post('/task', [CreateController::class, 'create']);

Route::delete('/task/{task}', [TaskController::class, 'delete']);
