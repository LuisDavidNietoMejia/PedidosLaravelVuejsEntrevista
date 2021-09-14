<?php
namespace PedidosLaravelVue\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use PedidosLaravelVue\User;
use PedidosLaravelVue\Cuenta;
use PedidosLaravelVue\Librodiario;
use PedidosLaravelVue\Operacionactualizada;

class MenuComposer
{
    public function compose(View $View)
    {
        $usuarioscomposer = User::all();
        $librosdiarioscomposer = Librodiario::all();
        $librosdiariosidcomposer = Librodiario::all();
        $cuentascomposer = Cuenta::all();
        $totalciclocomposer = 2;
        $operationupdatedcomposer = Operacionactualizada::all();

        if ($librosdiariosidcomposer->count() ==  0) {
            $ultimoid = 1;
        } else {
            $ultimoid =  $librosdiariosidcomposer->last()->id + 1;
        }

        $View->with(['operationupdatedcomposer' => $operationupdatedcomposer,'totalciclocomposer'=> $totalciclocomposer,'librosdiarioscomposer' => $librosdiarioscomposer,'ultimoid' => $ultimoid,'usuarioscomposer' => $usuarioscomposer,'cuentascomposer' => $cuentascomposer,'Carbon' => 'Carbon\Carbon']);
    }
}
