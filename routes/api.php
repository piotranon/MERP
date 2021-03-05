<?php

use App\Http\Controllers\CompanyEventRegistationController;
use App\Http\Controllers\CompanyEventController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/companyEvents', CompanyEventController::class);

Route::post('/companyEvents/{companyEventId}/register', [CompanyEventRegistationController::class, 'register']);
Route::post('/companyEvents/unsign/{registrationCode}', [CompanyEventRegistationController::class, 'removeRegistration']);
