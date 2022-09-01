<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SliderController;

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
    return view('welcome');
});

Route::group(['prefix' => '/slider'],function(){
    Route::get('/add',[SliderController::class,'add'])->name('slider.add');
    Route::post('/store',[SliderController::class,'store'])->name('slider.store');
    Route::get('/manage',[SliderController::class,'manage'])->name('slider.manage');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
