<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageFileController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
 
Route::get('/', [ImageFileController::class, 'index']);
 
Route::post('/add-watermark', [ImageFileController::class, 'imageFileUpload'])->name('image.watermark');