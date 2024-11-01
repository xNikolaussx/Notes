<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\NoteController;


Route::get('/', function () {
    return view('welcome');
});

// Используем PagesController для отображения форм и NoteController для обработки данных
// Отображение формы создания и редактирования через PagesController
Route::get('/notes', [PagesController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [PagesController::class, 'create'])->name('notes.create');
Route::get('/notes/{id}/edit', [PagesController::class, 'edit'])->name('notes.edit');

// Обработка сохранения новой заметки через POST
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

// Обработка обновления заметки через PUT
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');

// Маршрут для удаления заметки
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
