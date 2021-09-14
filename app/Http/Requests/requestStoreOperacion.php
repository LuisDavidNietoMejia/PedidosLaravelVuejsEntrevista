<?php

namespace PedidosLaravelVue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestStoreOperacion extends FormRequest
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
            'fecha' => 'required',
            'referencia' => 'required',
            'detalle' => 'required',
            'nombre.*' => 'distinct',
            'cantidad.*' => 'required|min:1|numeric|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
        ];
    }
}
