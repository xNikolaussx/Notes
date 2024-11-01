<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Метод для отображения всех заметок
    public function index(){
        $notes = Note::all();  // Получаем все заметки
        return view('note.index', compact('notes'));  // Передаем их в представление
    }

    // Метод для отображения формы редактирования заметки
    public function edit($id){
        $note = Note::findOrFail($id);  // Найти заметку по ID или выбросить ошибку
        return view('note.edit', compact('note'));  // Передаем заметку в шаблон
    }

    // Метод для отображения формы создания заметки
    public function create(){
        return view('note.create');
    }
}
