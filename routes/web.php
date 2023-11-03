<?php

use App\Http\Controllers\ProfileController;
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
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// <------------------------This is For Going one page to another ---------------------------->
Route::view('home', 'Home');
Route::view('category', 'categoryFormPage');
Route::view('blog', 'blogFormPage');
Route::view('Records', 'displayCategory');


// <------------------------This is For inserting Blog Data ---------------------------->
Route::post('formSave', 'App\Http\Controllers\blogFormController@AddRecord');

// <------------------------This is For viewing Blog Data ---------------------------->
Route::get('displayBlogRecords', 'App\Http\Controllers\blogFormController@displayRecord');

// <------------------------This is For Deleting Blog Data ---------------------------->
Route::get('displayBlogRecords/{id}', 'App\Http\Controllers\blogFormController@deleteBlogRecord');

// <------------------------This is For Edit Blog Data ---------------------------->
Route::get('blog/{id}', 'App\Http\Controllers\blogFormController@editBlogRecord');

// <------------------------This is For Update Exiting Blog Data ---------------------------->
Route::post('updateForm/{id}', 'App\Http\Controllers\blogFormController@updateBlogRecord');


// <------------------------This is For inserting Category Data ---------------------------->
Route::post('categoryForm', 'App\Http\Controllers\categoryFormController@addCategoryRecord');

// <------------------------This is For viewing Category Data ---------------------------->
Route::get('displayCategory', 'App\Http\Controllers\categoryFormController@displayCategoryRecord');

// <------------------------This is For Deleting Category Data ---------------------------->
Route::get('displayCategory/{id}', 'App\Http\Controllers\categoryFormController@deleteCategoryRecord');

// <------------------------This is For Edit Category Data ---------------------------->
Route::get('category/{id}', 'App\Http\Controllers\categoryFormController@editCategoryRecord');

// <------------------------This is For Update Exiting Category Data ---------------------------->
Route::post('updateCategory/{id}', 'App\Http\Controllers\categoryFormController@updateCategoryRecord');
