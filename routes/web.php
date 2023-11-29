<?php

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

/*Route::get('/', function () {
    return view('hotels.index');
});*/
Route::get('/crearHotel', function () {
    return view('hotels.modal-create-hotel');
});


use App\Http\Controllers\HotelesController;


Route::get('/', [HotelesController::class, 'index'])->name('hotels.index');
Route::get('/hotels/create', [HotelesController::class, 'create'])->name('hotels.create');
Route::post('/hotels', [HotelesController::class, 'store'])->name('hotels.store');
Route::get('/hotels/{hotel}/edit', [HotelesController::class, 'edit'])->name('hotels.edit');
Route::put('/hotels/{hotel}', [HotelesController::class, 'update'])->name('hotels.update');
Route::delete('/hotels/{hotel}', [HotelesController::class, 'destroy'])->name('hotels.destroy');
