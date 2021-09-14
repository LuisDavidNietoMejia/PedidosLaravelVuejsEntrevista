<?php

namespace PedidosLaravelVue\Http\Data;

use PedidosLaravelVue\User;

class UserStoreData
{
    protected $data_array;

    public function __construct($data_array)
    {
        $this->data_array = $data_array;
    }

    public function createUser()
    {
        $user = User::create($this->data_array);
        if ($user->id == null) {
            $message = 'No se pudo crear el usuario';
            abort(500, $message);
        }
        return $user;
    }
}
