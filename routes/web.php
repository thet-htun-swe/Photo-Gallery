<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;

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

Route::get('/', [AlbumsController::class, 'index']);
Route::get('/albums', [AlbumsController::class, 'index']);
Route::get('/albums/create', [AlbumsController::class, 'create'])->name('albums-create');
Route::post('/albums/store', [AlbumsController::class, 'store'])->name('albums-store');
Route::get('/albums/{id}', [AlbumsController::class, 'show'])->name('albums-show');

Route::get('/photos/create{id}', [PhotosController::class, 'create'])->name('photos-create');
Route::post('/photos/store', [PhotosController::class, 'store'])->name('photos-store');
Route::get('/photos/show{id}', [PhotosController::class, 'show'])->name('photos-show');
Route::delete('/photos/{id}/delete', [PhotosController::class, 'destroy'])->name('photos-delete');
