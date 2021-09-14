<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestactualizarcliente extends FormRequest
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
            'email' => 'required|string|email|max:50|unique:clientes,email,'.$this->getSegmentFromEnd().',id',
            'cedula' => 'required|string|min:6|max:9',
            'rif' => 'required|string|min:9|max:9',
            'dirrecion' => 'required|string|min:04|max:50',
            'telefono' => 'required|string|min:11|max:11|unique:clientes,telefono,'.$this->getSegmentFromEnd().',id',

        ];


    }
     private function getSegmentFromEnd($position_from_end = 1) {
      $segments =$this->segments();
      return $segments[sizeof($segments) - $position_from_end];
      }


}
