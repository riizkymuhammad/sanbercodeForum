<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/myquestion', [QuestionController::class, 'myquestion'])->name('question.myquestion');
Route::post('/question/answer/{id}', [QuestionController::class, 'answer'])->name('question.answer');
Route::resource('question', QuestionController::class);
Route::resource('profile', BiodataController::class);
Route::resource('category', CategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
