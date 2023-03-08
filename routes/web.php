<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

require __DIR__.'/auth.php';

//routes images

Route::get('/images' ,[ImageController::class, 'index'])->name('images.index');
Route::get('/image/create' ,[ImageController::class, 'create'])->name('images.create');
Route::post('/image/create' ,[ImageController::class, 'store'])->name('images.store');
Route::get('/image/show/{post:id}' ,[ImageController::class, 'show'])->name('images.show');
Route::get('/image/edit/{id}' ,[ImageController::class, 'edit'])->name('images.edit');
Route::patch('/image/edit/{post:id}' ,[ImageController::class, 'update'])->name('images.update');
Route::delete('/image/destroy/{id}' ,[ImageController::class, 'destroy'])->name('images.destroy');
