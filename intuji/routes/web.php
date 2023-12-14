<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',function(){
    return redirect('home');
});

Route::get('/home',[authController::class,'home'])->name('home');
Route::get('/all',[authController::class, 'showAllBlogs'])->name('showAll');
Route::get('/find/{id}',[authController::class, 'findBlog'])->name('findBlog');
Route::get('/update/{id}',[authController::class, 'showUpdate'])->name('showUpdate');
Route::post('/update/{id}',[authController::class, 'updateBlog'])->name('update');

Route::get('/findPair',[authController::class, function(){
    return view('findPair');
}]);

Route::post('/findPair',[authController::class, 'findPair'])->name('findPair');

Route::post('/home',[authController::class, 'postBlog'])->name('postBlog');