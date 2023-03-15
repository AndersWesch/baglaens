<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TumblerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('clubs', [ClubController::class, 'index'])->name('clubs');
Route::get('clubs/{club}', [ClubController::class, 'show'])->name('club');

Route::get('competitions/{competition}', [CompetitionController::class, 'show'])->name('competition');

Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('events/{event}', [EventController::class, 'show'])->name('event');

Route::get('passes', [PassController::class, 'index'])->name('passes');

Route::get('tumblers', [TumblerController::class, 'index'])->name('tumblers');
Route::get('tumblers/{tumbler}', [TumblerController::class, 'show'])->name('tumbler');

require __DIR__.'/auth.php';
