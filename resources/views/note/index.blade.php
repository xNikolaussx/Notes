<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список заметок</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Список заметок</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название заметки</th>
            <th scope="col">Описание</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
            <tr>
                <td>{{ $note->name }}</td>
                <td>{{ $note->description }}</td>
                <td>
                    <!-- Кнопка для редактирования -->
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Изменить</a>

                    <!-- Кнопка для удаления с подтверждением -->
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту заметку?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ route('notes.create') }}">Добавить заметку</a>
</div>
</body>
</html>
