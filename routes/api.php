<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('expense', ExpenseController::class);
Route::get('expense', [ExpenseController::class, 'index']);
Route::post('expense', [ExpenseController::class, 'store']);
Route::patch('expense/{id}', [ExpenseController::class, 'update']);
Route::get('expense/{id}', [ExpenseController::class, 'show']);
Route::delete('expense/{id}', [ExpenseController::class, 'destroy']);
