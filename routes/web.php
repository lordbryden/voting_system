<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/create-post', [AdminController::class, 'createPost'])->name('admin.createPost');
    Route::post('/admin/add-candidate/{post}', [AdminController::class, 'addCandidate'])->name('admin.addCandidate');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout'); // Change to GET method
    Route::delete('/admin/{candidate}', [AdminController::class, 'removeCandidate'])->name('candidates.destroy');


});


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::post('/submit-email', [HomeController::class, 'submitEmail'])->name('submit.email');
Route::post('/vote', [HomeController::class, 'vote'])->name('vote');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/vote', [HomeController::class, 'vote'])->name('vote');



require __DIR__.'/auth.php';
