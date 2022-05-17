<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\BookController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mybooks/{book_id}' , [BookController::class, 'index']); //display an existing book
Route::post('/mybooks/addBook' , [BookController::class, 'store']); //create a new book and display???

Route::get('/mybooks/{book_id}/{chapter_id}', [ChapterController::class, 'getChapter']); //return an already existing chapter's info
Route::post('/mybooks/{book_id}/addChapter' , [ChapterController::class, 'store']);
Route::post('/mybooks/{book_id}/{chapter_id}/updateChapterBody', [ChapterController::class, 'updateBody']);
Route::post('/mybooks/{book_id}/{chapter_id}/updateChapterTitle', [ChapterController::class, 'updateTitle']);

Route::get('/mybooks/{book_id}/{chapter_id}/getAllNotes', [NoteController::class, 'getAllNotes']);
Route::post('/mybooks/{book_id}/{chapter_id}/addNewNote', [NoteController::class, 'store']);
Route::post('/mybooks/{book_id}/{chapter_id}/{note_id}', [NoteController::class, 'update']);

Route::get('/publish', function(){
    return view('publish');
});

Route::get('/mybooks/help' , function(){
    return view('help');
});

Route::get('/mybooks/format/{book_id}' , [BookController::class, 'index']);