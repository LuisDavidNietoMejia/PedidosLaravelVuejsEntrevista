<?php

namespace PedidosLaravelVue\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use PedidosLaravelVue\Http\Library\ResponseJson;
use Carbon\Carbon;
use Auth;

class LoginApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        try {
            if (! $token) {
                return ResponseJson::danger(['danger'=>'Credenciales invalidas']);
            }
        } catch (JWTException $e) {
            return ResponseJson::danger(['danger'=>'No se pudo crear el token de autenticaciòn... intentelo de nuevo']);
        }
        $payload = JWTAuth::setToken($token)->getPayload();
        $expire_session = date('d/m/Y h:i', $payload->get('exp'));
        return ResponseJson::success(
        ['success'=>'Login exitoso'],
        [
          'access_token' => $token,
          'expire_session' => $expire_session,
          'user_id' => Auth::user()->id,
          'full_name' => Auth::user()->name.' '.Auth::user()->last_name]
        );
    }

    public function getExpireToken()
    {
        return ResponseJson::success(['success'=>'Consulta exitosa del token'], ['expire_session' => $expire_session]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return ResponseJson::danger(['danger'=>'Usuario no encontrado']);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return ResponseJson::danger(['danger'=>'El token ha expirado']);
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return ResponseJson::danger(['danger'=>'El token no es valido']);
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return ResponseJson::danger(['danger'=>'El token esta ausente (no ha sido enviado)']);
        }
        return response()->json(compact('user'));
    }

    public function authUser()
    {
        return ResponseJson::success(['success'=>'Consulta exitosa usuario autenticado'], ['user_auth' => auth()->user()]);
    }

    public function logout(Request $request)
    {
        $token = $request->header('Authorization');

        try {
            JWTAuth::parseToken()->invalidate($token);
            return ResponseJson::success(['success'=> 'Cerro sesion correctamente']);
        } catch (TokenExpiredException $exception) {
            return ResponseJson::danger(['danger'=> 'El token de autenticaciòn ha expirado...no es necesario cerrar sesion...ya esta cerrada.']);
        } catch (TokenInvalidException $exception) {
            return ResponseJson::danger(['danger'=> 'Token invalido...no puede cerrar session']);
        } catch (JWTException $exception) {
            return ResponseJson::danger(['danger'=> 'El token de autenticaciò no ha sido enviado... este campo es requerido.']);
        }
        return ResponseJson::success(['success'=>'Salio del sistema con exito']);
    }

    public function refresh()
    {
        $token = auth()->refresh();
        $expireAction = auth()->factory()->getTTL() * 60;
        $payload = JWTAuth::setToken($token)->getPayload();
        $expire_session = date('d/m/Y h:i', $payload->get('exp'));

        return ResponseJson::success(
            ['success'=> 'Token actualizado correctamente'],
            [
              'access_token' => $token,
              'expire_session' =>$expire_session
            ]
        );
    }
}
