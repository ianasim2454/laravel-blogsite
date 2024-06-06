<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/',[HomeController::class,'homepage']);

// Route::get('/home', function () {
//     return view('home.homepage');
// })->middleware(['auth', 'verified'])->name('home');

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//Admin Path:
Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');

//Admin Post Accept or Reject:
Route::get('/post_accept/{id}',[AdminController::class,'post_accept'])->name('accept');
Route::get('/post_reject/{id}',[AdminController::class,'post_reject'])->name('reject');



//POST
Route::get('/post_page',[AdminController::class,'post_page'])->name('post.page');
Route::post('/add_post',[AdminController::class,'add_post'])->name('add.post');
Route::get('/show_post',[AdminController::class,'show_post'])->name('show.post');
Route::get('/delete_post/{id}',[AdminController::class,'delete_post'])->name('post.delete');
Route::get('/edit_post/{id}',[AdminController::class,'edit_post'])->name('post.edit');
Route::post('/update_post/{id}',[AdminController::class,'update_post'])->name('update.post');
Route::get('/post_details/{id}',[HomeController::class,'post_details'])->name('post.details');

// User Post
Route::middleware('auth')->group(function () {
Route::get('/create_post',[UserController::class,'create_post'])->name('create.post');
Route::post('/add_post',[UserController::class,'add_post'])->name('post.add');
Route::get('/your_post',[UserController::class,'your_post'])->name('your.post');
Route::get('/delete_mypost/{id}',[UserController::class,'delete_mypost'])->name('delete.mypost');
Route::get('/edit_mypost/{id}',[UserController::class,'edit_mypost'])->name('edit.mypost');
Route::post('/update_mypost/{id}',[UserController::class,'update_mypost'])->name('update.mypost');

});
