<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function (){
    Route::resource('playlist', PlaylistController::class);
    Route::resource('video', VideoController::class);
    Route::get('/videosearch', [VideoController::class, 'search']);
    Route::post('/addtoplaylist', [VideoController::class, 'addtoplaylist']);
    Route::post('/removefromplaylist', [VideoController::class, 'removefromplaylist']);
});

require __DIR__.'/auth.php';
