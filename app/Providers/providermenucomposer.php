<?php

namespace PedidosLaravelVue\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class providermenucomposer extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['home','user.index','librodiario.index','historial.indexlibrodiario','historial.indexoperations','operationupdated.index'], 'PedidosLaravelVue\Http\ViewComposer\MenuComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
