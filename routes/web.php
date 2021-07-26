<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\VoteController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/s', function () {
    echo 'vo'.'ieurye'.'te';
});

Route::post('store/competition', [CompetitionController::class, 'store'])->name('store.competition');
Route::post('/vote', [VoteController::class, 'vote'])->name('vote');

Route::get('{unique_url}', [CompetitionController::class, 'show']);
