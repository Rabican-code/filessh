<?php

use App\Http\Controllers\AppController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::put('/{fileName}', [AppController::class, 'sendFile']);
Route::get('/privateDownload/{slug}', [AppController::class, 'privateDownloadFile']);
Route::get('/download/{slug}', [AppController::class, 'downloadFile'])->name('download');
Route::get('/{fileSlug}/{fileName}', [AppController::class, 'getFile']);
Route::delete('/delete/{id}', [AppController::class, 'deleteFile']);


Route::get('/welcome', function () {
    return Inertia::render('Welcome');
})->name('welcome');
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AppController::class, 'Token'])->name('dashboard');
});
