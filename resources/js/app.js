import './bootstrap';

$(document).ready(function() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/notes',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            const notesList = $('#notes-list');

            notesList.empty();
            data.forEach(note => {
                notesList.append(`<a href="http://127.0.0.1:8000/notes/${note.id}/edit"><div>${note.name} : ${note.description}</div> </a>`);            });
        },
        error: function(xhr, status, error) {
            console.error('Ошибка при получении данных:', error);
        }
    });
});

