<?php

use App\Http\Controllers\DocumentController;
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
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');//
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->name('auth');//

Route::middleware(['auth'])->group(function() {
    Route::get('/', [DocumentController::class, 'list'])->name('home');//
    Route::get('/create', [DocumentController::class, 'createView'])->name('create-document');//
    Route::post('/create', [DocumentController::class, 'create'])->name('create-document-post');//
    Route::get('/show/{document}', [DocumentController::class, 'show'])->name('show-document');//
    Route::get('/edit/{document}', [DocumentController::class, 'editView'])->name('edit-document');//
    Route::post('/edit/{document}', [DocumentController::class, 'edit'])->name('edit-document-post');//
    Route::get('/share/{document}', [DocumentController::class, 'shareView'])->name('share-document');
    Route::post('/share/{document}', [DocumentController::class, 'share'])->name('share-document-post');
});
