<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заметки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/create.js'])
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Создание заметки</h1>
    <form action="{{ route('notes.store') }}" method="POST" id="note-form">
    @csrf
    <div class="form-group">
        <label for="noteTitle">Название заметки</label>
        <input type="text" name="name" class="form-control" id="note-name" placeholder="Введите название заметки" required>
    </div>
    <div class="form-group">
        <label for="noteDescription">Описание заметки</label>
        <textarea class="form-control" name="description" id="note-description" rows="5" placeholder="Введите описание заметки" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>


</div>

</body>
</html>
