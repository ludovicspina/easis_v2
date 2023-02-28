<?php

use App\Http\Controllers\CoffreDeGuildeController;
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
    return view('base');
});

Route::get('cdg', [CoffreDeGuildeController::class, 'getData'])->name('cdg');
Route::post('cdgAdd', [CoffreDeGuildeController::class, 'storeData'])->name('cdgAdd');
Route::put('cdgRemove/{id}', [CoffreDeGuildeController::class, 'removeData'])->name('cdgRemove');
Route::put('cdgAddOne/{id}', [CoffreDeGuildeController::class, 'addOne'])->name('cdgAddOne');
Route::put('cdgRemoveOne/{id}', [CoffreDeGuildeController::class, 'removeOne'])->name('cdgRemoveOne');


