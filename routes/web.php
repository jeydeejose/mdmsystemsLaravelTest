<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/voucher-code/store', [App\Http\Controllers\VoucherCodeController::class, 'store']);
Route::resource('/voucher-code', App\Http\Controllers\VoucherCodeController::class);

Route::group(['middleware' => ['role:SuperAdmin|GroupAdmin']], function () {

    Route::get('/groups/datatable', [App\Http\Controllers\GroupController::class, 'datatable'])->name('groups.datatable');

    Route::post('/groups/update', [App\Http\Controllers\GroupController::class, 'update']);
    Route::post('/groups/store', [App\Http\Controllers\GroupController::class, 'store']);
    Route::post('/groups/destroy', [App\Http\Controllers\GroupController::class, 'destroy']);
    Route::get('/groups/{id}/adduser/{userid}', [App\Http\Controllers\GroupController::class, 'addUser'])->name('groups.addUser');
    Route::get('/groups/{id}/removeUser/{userid}', [App\Http\Controllers\GroupController::class, 'removeUser'])->name('groups.removeUser');
    Route::get('/groups/{id}/viewcodes/{userid}', [App\Http\Controllers\GroupController::class, 'viewCodes'])->name('groups.viewCodes');
    Route::get('/groups/export/{id}/{type}', [App\Http\Controllers\GroupController::class, 'export'])->name('groups.export');
    Route::resource('groups', App\Http\Controllers\GroupController::class);

});

