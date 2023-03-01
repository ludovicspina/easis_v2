<?php

use App\Http\Controllers\CoffreDeGuildeController;
use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'base')->name('home');


Route::get('cdg', [CoffreDeGuildeController::class, 'getData'])->name('cdg');
Route::post('cdgAdd', [CoffreDeGuildeController::class, 'storeItemData'])->name('cdgAdd');
Route::post('storeLogData', [CoffreDeGuildeController::class, 'storeLogData'])->name('storeLogData');
Route::put('cdgAddOne/{id}', [CoffreDeGuildeController::class, 'addOneItem'])->name('cdgAddOne');
Route::put('cdgRemoveOne/{id}', [CoffreDeGuildeController::class, 'removeOneItem'])->name('cdgRemoveOne');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
