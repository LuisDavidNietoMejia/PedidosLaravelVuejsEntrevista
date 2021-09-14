<?php namespace PedidosLaravelVue\Http\Object;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserStoreObject
{
    private $name;
    private $last_name;
    private $email;
    private $password;

    public function __construct($request)
    {
        $this->name = $request->name;
        $this->last_name = $request->last_name;
        $this->email = $request->email;
        $this->password = Hash::make($request->password);
    }

    public function getArrayData()
    {
        return array(
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
        );
    }
}
