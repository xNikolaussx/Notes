<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Notes App</title>
    <!-- Подключение стилей (например, Bootstrap) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <!-- Ваше меню навигации -->
        <a href="{{ route('notes.index') }}">Заметки</a>
        @auth
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endauth
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Подключение скриптов (например, Bootstrap JS) -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
