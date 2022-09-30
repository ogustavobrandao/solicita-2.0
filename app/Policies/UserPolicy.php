<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Checa se o usuário logado é do tipo servidor.
     *
     * @return bool
     */
    public function isServidor(User $user)
    {
        return $user->tipo == User::TIPO['servidor'];
    }

    /**
     * Checa se o usuário logado é do tipo administrador.
     *
     * @return bool
     */
    public function isAdministrador(User $user)
    {
        return $user->tipo == User::TIPO['administrador'];
    }
}
