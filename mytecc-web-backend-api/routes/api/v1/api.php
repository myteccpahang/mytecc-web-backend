<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserAuthController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\LinkController;

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

Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:user'])->group(function () {

        Route::post('login', [UserAuthController::class, 'userLogin'])->name('login');
        Route::post('signup', [UserAuthController::class, 'userSignup'])->name('signup');
    });

    Route::middleware(['auth:user', 'ability:user'])->group(function () {

        Route::post('logout', [UserAuthController::class, 'userLogout'])->name('logout');
        Route::get('profile/{id}', [UserController::class, 'show'])->name('profile');
    });
});

Route::get('links', [LinkController::class, 'index']);
