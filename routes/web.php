<?php

use App\Http\Controllers\CarsController;
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

Route::resource('/cars', CarsController::class)->middleware(['auth'])->except(['index', 'show']);

Route::get('/cars/index', [CarsController::class, 'index'])->name('cars.index');

Route::get('/cars/show/{id}', [CarsController::class, 'show'])->name('cars.show');

Route::delete('/cars/images/{id}', [CarsController::class, 'deleteImage'])->middleware(['auth']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
