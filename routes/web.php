<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\UserController;
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
Route::get('/', [blogController::class,'index']);
Route::get('/create_blog_page', [blogController::class,'createBlogPage']);
Route::post('/create', [blogController::class,'create']);
Route::get('/my_blogs/{id}', [blogController::class,'myBlogs']);
Route::get('/show_page/{id}', [blogController::class,'showPage']);
Route::get('/search', [blogController::class,'search']);
Route::get('/edit_page/{id}', [blogController::class,'editPage']);
Route::put('/edit/{id}', [blogController::class,'edit']);
Route::get('/delete_blog/{id}', [blogController::class,'deleteBlog']);


Route::get('/register_page', [UserController::class,'registerPage']);
Route::post('/register_form', [UserController::class,'registerForm']);

Route::get('/login_page', [UserController::class,'loginPage']);
Route::post('/login_form', [UserController::class,'loginForm']);


Route::get('/logout',function () {
    auth()->logout();
    return redirect('/');
});





