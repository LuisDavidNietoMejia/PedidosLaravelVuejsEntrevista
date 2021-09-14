<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestactualizarproducto extends FormRequest
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
            //
            'nombre' => 'required|min:4|max:50|unique:inventarios,nombre,'.$this->getSegmentFromEnd().',id',
            'cantidad' => 'required|min:1|integer',
            'precio' => 'required|min:1|integer',


        ];
    }

    private function getSegmentFromEnd($position_from_end = 1) {
     $segments =$this->segments();
     return $segments[sizeof($segments) - $position_from_end];
     }
}
