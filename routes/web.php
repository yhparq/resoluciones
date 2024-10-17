<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResolutionPdfController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [ResolutionPdfController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/pdfs', [PdfController::class, 'index'])->name('pdfs.index');
    // Route::post('/pdfs', [PdfController::class, 'store'])->name('pdfs.store');
    // Route::delete('/pdfs/{pdfs}', [PdfController::class, 'destroy'])->name('pdf.destroy');

    Route::get('/resoluciones', [ResolutionPdfController::class, 'index'])->name('resoluciones.index');
    Route::post('/resoluciones', [ResolutionPdfController::class, 'storage'])->name('resoluciones.storage');
    Route::delete('/resoluciones/{pdfs}', [ResolutionPdfController::class, 'destroy'])->name('resoluciones.destroy');

});

// Route::get('/resoluciones', [PdfController::class, 'publicIndex'])->name('resoluciones.publicindex');

Route::get('/resoluciones', [ResolutionPdfController::class, 'publicIndex'])->name('resoluciones.publicindex');



require __DIR__.'/auth.php';
