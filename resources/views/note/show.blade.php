<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заметки</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/show.js'])
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Редактирование заметки</h1>
    <form id="note-form" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="noteTitle"></label>
            <input type="text" class="form-control" id="note-name" name="name">
        </div>
        <div class="form-group">
            <label for="noteDescription">Описание заметки</label>
            <textarea class="form-control" id="note-description" name="description" rows="5" placeholder="Введите описание заметки" required></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
    <form id="delete-button" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <input type="hidden" id="note-id" name="note_id"> <!-- Скрытое поле для ID заметки -->
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-danger" id="delete-button">Удалить заметку</button>
        </div>
    </form>
</div>

</body>
</html>
