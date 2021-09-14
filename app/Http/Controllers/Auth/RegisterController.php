<?php

namespace PedidosLaravelVue\Http\Controllers\Auth;

use PedidosLaravelVue\User;
use PedidosLaravelVue\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerUser(Request $request)
    {
        dd($request->all());
    }
}
