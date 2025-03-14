<?php

use App\Http\Controllers\RayonController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;

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

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum','restrictRole:admin']], function(){
    Route::apiResource('categories',CategoryController::class);
    Route::apiResource('rayons', RayonController::class);
    Route::apiResource('clients',UserController::class);
    Route::patch('/clients/{client}/suspend',[UserController::class,'suspend']);
    Route::patch('/clients/{client}/activate',[UserController::class,'activate']);
});
