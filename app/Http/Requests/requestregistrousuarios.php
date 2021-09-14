<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestregistrousuarios extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|min:4|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'apellido' => 'required|min:4|max:255|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'password' => 'required|string|min:6|confirmed',
          'cedula' => 'required|string|min:6|max:8',
          'dirrecion' => 'required|string|min:05|max:50',       
          'respuesta'=>'required|string|min:05|max:50',
        ];
    }
}
