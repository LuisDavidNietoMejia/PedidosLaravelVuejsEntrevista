<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestregistrocliente extends FormRequest
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

          'nombre' => 'required|min:4|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'apellido' => 'nullable|min:4|max:255|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'cedula' => 'nullable|string|min:6|max:9',
          'rif' => 'nullable|string|min:9|max:9',
          'email' => 'required|string|email|max:50|unique:clientes',
          'dirrecion' => 'required|string|min:04|max:50',
          'telefono' => 'required|string|min:11|max:11|unique:clientes',

            //
        ];
    }
}
