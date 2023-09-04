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

use App\Http\Controllers\KlubController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/input-klub', [KlubController::class, 'inputKlubForm']);
Route::post('/input-klub', [KlubController::class, 'inputKlub']);
// Route::get('/input-skor', [KlubController::class, 'inputSkorForm']);
// Route::post('/input-skor', 'KlubController@inputSkor')->name('inputSkor');
Route::get('/input-skor', [KlubController::class, 'inputSkorForm'])->name('inputSkorForm');
Route::post('/input-skor', [KlubController::class, 'inputSkor'])->name('inputSkor');

Route::get('/klasemen', [KlubController::class, 'viewKlasemen']);

// Route dengan Method PUT
Route::put('/klub/{id}', [KlubController::class, 'updateKlub']);

// Route dengan Method DELETE
Route::delete('/klub/{id}', [KlubController::class, 'deleteKlub']);

