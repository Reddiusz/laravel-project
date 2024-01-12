<?php

use App\Http\Controllers\dbController;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(dbController::class)->group(function (){
    Route::get('/jaworek/310589/people', 'index');
    Route::get('/jaworek/310589/people/{id}', 'show');
    Route::post('/jaworek/310589/people/create', 'store');
    Route::put('/jaworek/310589/people/update/{id}', 'update');
    Route::delete('/jaworek/310589/people/destroy/{id}', 'destroy');
});