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

//PUT Api for multiple data update
Route::put('/update-user-details/{id}', [UserApiController::class, 'updateUserDetails'])->name('update.user.list');
//PATCH Api for single data update
Route::patch('/update-user-single-details/{id}', [UserApiController::class, 'updateSingleUserDetails'])->name('update.userssigle.item');

//DELETE Api for single data update
Route::delete('/delete-user-details/{id}', [UserApiController::class, 'deleteUserDetails'])->name('delete.user.details');
