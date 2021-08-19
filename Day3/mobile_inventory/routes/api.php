<?php

use App\Http\Controllers\UsersController;
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

Route::post('/users',[UsersController::class, 'createUser']);
Route::get('/users',[UsersController::class, 'getAllUsers']);
Route::get('/users/name/{username}',[UsersController::class,'getUserByName']);
Route::get('/users/number/{phone_number}',[UsersController::class,'getUserByPhoneNo']);
Route::get('/users/e_mail/{e_mail}',[UsersController::class,'getUsersByEmail']);
Route::delete('/users/name/{username}',[UsersController::class,'deleteUserByName']);
Route::delete('/users/e_mail/{email}',[UsersController::class,'deleteUserByEmail']);
Route::delete('/users/phoneNo/{phone_number}',[UsersController::class,'deleteUserByPhoneNo']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
