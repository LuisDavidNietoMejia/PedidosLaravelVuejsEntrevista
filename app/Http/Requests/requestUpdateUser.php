<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestUpdateUser extends FormRequest
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
          'cedula' => 'required|string|min:6|max:8',
          'dirrecion' => 'required|min:4|max:50|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
          'imagen' => 'image',
        ];
    }


    private function getSegmentFromEnd($position_from_end = 1)
    {
        $segments =$this->segments();
        return $segments[sizeof($segments) - $position_from_end];
    }
}
