<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\LinkController;
use App\Http\Controllers\Api\v1\HomepageController;

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

// links.myteccpahang.com
Route::get('links', [LinkController::class, 'index']);

// myteccpahang.com
Route::get('homepage', [HomepageController::class, 'index']);
