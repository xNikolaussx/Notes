<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Определяет, может ли пользователь просматривать заметку.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return bool
     */
    public function view(User $user, Note $note)
    {
        return true; // Временно разрешить всем пользователям
    }

    /**
     * Определяет, может ли пользователь обновлять заметку.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return bool
     */
    public function update(User $user, Note $note)
    {
        return true; // Временно разрешить всем пользователям
    }

    /**
     * Определяет, может ли пользователь удалять заметку.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return bool
     */
    public function delete(User $user, Note $note)
    {
        return true; // Временно разрешить всем пользователям
    }

    /**
     * Определяет, может ли пользователь переключать статус выполнения заметки.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Note  $note
     * @return bool
     */
    public function toggleCompleted(User $user, Note $note)
    {
        return true; // Временно разрешить всем пользователям
    }
}
