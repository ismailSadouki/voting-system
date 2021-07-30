<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VoteController;
use App\Models\Competition;
use App\Models\Contestant;
use Illuminate\Support\Facades\Request;
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
    $d = 'tree';
    return view('welcome',compact('d'));
});


Route::post('store/competition', [CompetitionController::class, 'store'])->name('store.competition');
Route::post('/vote', [VoteController::class, 'vote'])->name('vote');

Route::get('{unique_url}', [CompetitionController::class, 'show'])->name('show');


Route::get('payment/{id}', [PaymentController::class, 'paymentPage'])->name('payment.page');
Route::post('payment', [PaymentController::class, 'payment'])->name('payment');

