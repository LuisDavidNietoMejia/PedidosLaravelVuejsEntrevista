<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestUpdateDataSecurity extends FormRequest
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

          'password' => 'required|string|min:6|confirmed',
          'respuesta'=>'required|string|min:05|max:50|confirmed',
        ];
    }
}
