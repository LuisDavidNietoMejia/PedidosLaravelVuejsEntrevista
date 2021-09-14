<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CuentaResource extends Resource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id'         => $this->id,
            'nombre'       => $this->nombre,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
