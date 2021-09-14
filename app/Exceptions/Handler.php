<?php

namespace PedidosLaravelVue\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use PedidosLaravelVue\Http\Library\ResponseJson;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [

    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
                ? response()->json(['message' => $exception->getMessage()], 401)
                : redirect()->guest(route('login'));
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            if ($request->wantsJson()) {
                return ResponseJson::danger(['danger'=>'formulario no valido, recarge la pagina']);
            }
        }
        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            if ($request->wantsJson()) {
              return $request->expectsJson()
                      ? ResponseJson::unauthorized(['No esta autenticado en el sistema...'])
                      : redirect()->guest(route('login'));
            }
        }
        // return ResponseJson::success(['error'=> $exception->getMessage(). ' '.$exception->getFile().' '.$exception->getLine() ]);
        return parent::render($request, $exception);
    }
}
