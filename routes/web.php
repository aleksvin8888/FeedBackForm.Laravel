<?php

use App\Http\Controllers\Admin\FeedBackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\FeedBackFormController;
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


Route::group([
    'middleware' => 'auth',
],
    function() {

        Route::get('/', [HomeController::class, 'index'])->name('main');
        Route::get('/feedbackform', [FeedBackFormController::class, 'create'])->name('main.feedbackform.create');
        Route::post('/feedbackform', [FeedBackFormController::class, 'store'])->name('main.feedbackform.store');


        Route::group([
            'middleware' => 'role:manager',
        ], function() {
            Route::get('/feedBack', [FeedBackController::class, 'index'])->name('admin.feedBack.index');
            Route::put('feedBack/{feedback}', [FeedBackController::class, 'update'])->name('admin.feedBack.update');
        });

    });

Auth::routes();
