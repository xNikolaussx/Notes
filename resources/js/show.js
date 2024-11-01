import './bootstrap';

$(document).ready(function() {
    // Извлечение ID заметки из URL
    const urlParts = window.location.pathname.split('/'); // Разделяем путь URL
    const noteId = urlParts[urlParts.length - 2]; // Предполагаем, что ID находится перед "edit"

    // Получение заметки по ID
    if (noteId) {
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes/${noteId}`, // URL для получения заметки по ID
            method: 'GET',
            dataType: 'json',
            success: function(note) {
                // Обработка полученной заметки
                $('#note-name').val(note.name);
                $('#note-description').val(note.description); // Устанавливаем значение в текстовое поле
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка при получении заметки:', textStatus, errorThrown);
            }
        });
    }

    // Обработка отправки формы
    $('#note-form').on('submit', function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        const formData = {
            id: noteId, // Добавляем noteId в данные
            name: $('#note-name').val(),
            description: $('#note-description').val()
        };

        // AJAX-запрос для обновления заметки
        $.ajax({
            url: `http://127.0.0.1:8000/api/notes/${noteId}`, // Используем noteId для обновления
            method: 'PUT',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(formData), // Отправляем данные в формате JSON
            success: function(data) {
                alert('Заметка обновлена');
                window.location.href = '/notes';
                // Вы можете обновить поля формы или перенаправить пользователя
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка при обновлении заметки:', textStatus, errorThrown);
                alert('Произошла ошибка при обновлении заметки.');
            }
        });
    });

    $('#delete-button').on('click', function() {
        if (confirm('Вы уверены, что хотите удалить эту заметку?')) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/notes/${noteId}`, // URL для удаления заметки
                method: 'DELETE',
                dataType: 'json',
                data: {
                    _token: $('input[name="_token"]').val() // Добавляем CSRF-токен
                },
                success: function(data) {
                    alert('Заметка удалена');
                    window.location.href = '/notes'; // Перенаправление на страницу со списком заметок
                },
            });
        }
    });
});
