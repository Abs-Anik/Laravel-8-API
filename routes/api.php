<?php

use App\Http\Controllers\UserApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Get Api
Route::get('/user/{id?}', [UserApiController::class, 'showUser'])->name('user.list');
//Single Post Api
Route::post('/add-user', [UserApiController::class, 'addUser'])->name('user.store');
//Multiple Post Api
Route::post('/add-multiple-user', [UserApiController::class, 'addMultipleUser'])->name('multipleuser.store');
