<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/','create/createPage')->name('post#home');
Route::get('create/createPage',[PostController::class,'create'])->name('post#createPage');
Route::post('post/create',[PostController::class,'postCreate'])->name('post#create');

//Delete
Route::get('post/delete/{id}',[PostController::class,'postDelete'])->name('post#delete');

// Route::delete('post/delete/{id}',[PostController::class,'postDelete'])->name('post#delete');

//Update
Route::get('post/updatePage/{id}',[PostController::class,'updatePage'])->name('post#updatePage');

//Edit
Route::get('post/editPage/{id}',[PostController::class,'editPage'])->name('edit#editPage');

Route::post('post/update',[PostController::class,'update'])->name('post#update');
