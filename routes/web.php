<?php

use App\Http\Controllers\imageController;
use Illuminate\Support\Facades\Route;

//Pages
Route::view('/dashboard','pages.dashboard')->name('dashboard');
Route::view('/dashboard/singleImage','pages.singleImage')->name('upload.single');
Route::view('/dashboard/multipleImage','pages.multipleImage')->name('upload.multiple');


//backend
Route::post('/singleUpload',[imageController::class,'singleImage'])->name('single');
Route::post('/multipleUpload',[imageController::class,'multipleImage'])->name('multiple');
