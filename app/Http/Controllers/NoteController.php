<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Метод для отображения всех заметок
    public function index(){
        return response(Note::all());
    }

    // Метод для отображения одной заметки
    public function show(Note $note){
        return response($note);
    }

    // Метод для отображения формы создания новой заметки
    public function create(){
        return view('note.create');  // Вернуть представление для создания
    }

    // Метод для создания новой заметки (сохранение данных)
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Note::create($data);

        return redirect()->route('notes.index')->with('success', 'Заметка создана!');
    }

    // Метод для обновления заметки
    public function update(Request $request, Note $note){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $note->update($data);
    
        return redirect()->route('notes.index')->with('success', 'Заметка обновлена!');
    }

    // Метод для удаления заметки
    public function destroy(Note $note){
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Заметка удалена!');
    }
}
