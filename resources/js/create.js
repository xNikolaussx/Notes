import './bootstrap';

$(document).ready(function() {
    // Обработка отправки формы
    $('#note-form').on('submit', function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        $.ajax({
            url: 'http://127.0.0.1:8000/api/notes',
            method: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify({
                name: $('#note-name').val(),
                description: $('#note-description').val()
            }),
            success: function(data) {
                alert('Заметка создана');
                window.location.href = '/notes'; // Перенаправление на страницу со списком заметок
            },
        });
    });
});
