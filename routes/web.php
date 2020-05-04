<?php

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
    return view('index');
});

//posts
Route::get('post/add', 'PostController@AddPost')->name('post.add');
Route::post('post/save', 'PostController@PostCategory')->name('post.save');
Route::get('post/all', 'PostController@AllPost')->name('post.all');
Route::get('post/view/{id}', 'PostController@ViewPost');
Route::get('post/edit/{id}', 'PostController@EditPost');
Route::post('post/update/{id}', 'PostController@UpdatePost');
Route::get('post/delete/{id}', 'PostController@DeletePost');

//category
Route::get('category/add', 'CategoryController@AddCategory')->name('category.add');
Route::post('category/save', 'CategoryController@SaveCategory')->name('category.save');
Route::get('category/all', 'CategoryController@AllCategory')->name('category.all');
Route::get('category/view/{id}', 'CategoryController@ViewCategory');
Route::get('category/edit/{id}', 'CategoryController@EditCategory');
Route::post('category/update/{id}', 'CategoryController@UpdateCategory');
Route::get('category/delete/{id}', 'CategoryController@DeleteCategory');


//student

Route::get('student/add', 'StudentController@AddStudent')->name('student.add');
Route::post('student/save', 'StudentController@SaveStudent')->name('student.save');
Route::get('student/all', 'StudentController@AllStudent')->name('student.all');
Route::get('student/view/{id}', 'StudentController@ViewStudent');
Route::get('student/delete/{id}', 'StudentController@DeleteStudent');
Route::get('student/edit/{id}', 'StudentController@EditStudent');
Route::post('student/update/{id}', 'StudentController@UpdateStudent');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
