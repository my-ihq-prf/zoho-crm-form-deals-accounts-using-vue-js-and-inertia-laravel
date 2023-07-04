<?php

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([
    'throttle:3000',
])->group(function () {
    Route::prefix('zoho')->name('zoho.')->group(function () {
        Route::controller(\App\Http\Controllers\ZohoCrmAccountController::class)->group(function () {
            Route::post('/add-new-account', 'addNewAccount')->name('add-new-account');
            Route::post('/update-account', 'updateAccount')->name('update-account');
            Route::post('/delete-account', 'deleteAccount')->name('delete-account');
            Route::get('/all-accounts', 'allAccounts')->name('all-accounts');
        });
        Route::controller(\App\Http\Controllers\ZohoCrmDealController::class)->group(function () {
            Route::get('/all-deals', 'allDeals')->name('all-accounts');
            Route::post('/all-deals-by-acc-id', 'allDealsByAccId')->name('all-deals-by-acc-id');
            Route::post('/add-deal', 'addDeal')->name('add-deal');
            Route::post('/update-deal', 'updateDeal')->name('update-deal');
            Route::post('/delete-deal', 'deleteDeal')->name('delete-deal');
        });
    });
});
