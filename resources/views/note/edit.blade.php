<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заметки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Редактирование заметки</h1>

    <!-- Форма для редактирования заметки -->
    <form action="{{ route('notes.update', $note->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="noteTitle">Название заметки</label>
        <input type="text" name="name" class="form-control" id="note-name" value="{{ $note->name }}" required>
    </div>

    <div class="form-group">
        <label for="noteDescription">Описание заметки</label>
        <textarea name="description" class="form-control" id="note-description" rows="5" required>{{ $note->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
</form>

    <!-- Кнопка для возврата на список заметок -->
    <a class="btn btn-secondary mt-3" href="{{ route('notes.index') }}">Вернуться к списку заметок</a>
</div>
</body>
</html>
