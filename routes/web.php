<?php

use App\Http\Controllers\CalculateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriteriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // profile route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // user selection route
    Route::get('/selection', [CalculateController::class, 'selection'])->name('selection');
    Route::get('/selection/print_pdf', [CalculateController::class, 'print_pdf'])->name('selection.print_pdf');
});

Route::middleware('admin')->group(function() {
    // student route
    Route::resource('/student', StudentController::class);

    // category route
    Route::resource('/category', CategoryController::class);

    // calculate route
    Route::get('/calculate', [CalculateController::class, 'index'])->name('calculate');
});

require __DIR__ . '/auth.php';
