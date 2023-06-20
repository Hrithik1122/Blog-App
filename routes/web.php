<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\PostsController@index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'block'])->name('dashboard');

Route::middleware(['auth', 'block'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // ---------------- For Creating post --------------
    Route::post('/dashboard', [ProfileController::class, 'store'])->name('store');
    Route::get('/my-posts', [ProfileController::class, 'show']);

    Route::get('edit/{posts}', [ProfileController::class, 'postedit'])->name('edit');
    Route::put('updatepost/{posts}', [ProfileController::class, 'postupdate'])->name('updatepost');
    Route::delete('delete/{posts}', [ProfileController::class, 'postdelete'])->name('delete');


});

require __DIR__.'/auth.php';

// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // Login Route
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });

    Route::middleware('admin')->group(function(){
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('dashboard', [HomeController::class, 'show'])->name('dashboard');
        Route::get('user-list', [HomeController::class, 'userlist']);
        Route::put('block/{user}', [HomeController::class, 'block'])->name('block');
        Route::put('unblock/{user}', [HomeController::class, 'unblock'])->name('unblock');

        Route::get('edit/{posts}', [HomeController::class, 'postedit'])->name('edit');
        Route::put('update-post/{posts}', [HomeController::class, 'postupdate'])->name('update-post');
        Route::delete('delete/{posts}', [HomeController::class, 'postdelete'])->name('delete');
    });
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});