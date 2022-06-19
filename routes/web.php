<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware("auth")->group(function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/directory', function () {
        return view('content.directory');
    })->name('directory');

    Route::get('/error404', function () {
        return view('content.error-404');
    })->name('error404');

    Route::get('/error500', function () {
        return view('content.error500');
    })->name('error500');
    Route::get('/my-profile', function () {
        return view('profile.profile');
    })->name('MyProfile');



    Route::get('/profile', [ProfileController::class,'profile'])->name('profile');
//    Route::get('/profile-edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::get('/edit-password', [ProfileController::class,'password'])->name('profile.edit.password');
    Route::get('/edit-name-and-email', [ProfileController::class,'NameEmail'])->name('profile.edit.name.email');
    Route::get('/edit-photo', [ProfileController::class,'photo'])->name('profile.edit.photo');

    Route::post('/change-photo', [ProfileController::class,'ChangePhoto'])->name('profile.ChangePhoto');
    Route::post('/change-name', [ProfileController::class,'ChangeName'])->name('profile.ChangeName');
    Route::post('/change-email', [ProfileController::class,'ChangeEmail'])->name('profile.ChangeEmail');
    Route::post('/change-password', [ProfileController::class,'ChangePassword'])->name('profile.ChangePassword');
//        Route::post("/update-user-info",[ProfileController::class,"updateInfo"])->name("profile.update.info");


    Route::resource("category",'\App\Http\Controllers\CategoryController');
    Route::resource('article','\App\Http\Controllers\ArticleController');
    Route::resource('product','\App\Http\Controllers\ProductController');
    Route::resource("photo",\App\Http\Controllers\PhotoController::class);



});








