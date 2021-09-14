<?php

namespace PedidosLaravelVue\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Image;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use PedidosLaravelVue\Http\Requests\UserStoreRequest;
use PedidosLaravelVue\Http\Requests\requestUpdateUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use PedidosLaravelVue\User;

use PedidosLaravelVue\Http\Object\UserStoreObject;
use PedidosLaravelVue\Http\Data\UserStoreData;
use Auth;
use PedidosLaravelVue\Http\Library\ResponseJson;

class UserController extends Controller
{

    public function store(UserStoreRequest $request)
    {
      try {
            DB::beginTransaction();
            $UserStoreObject = new UserStoreObject($request);
            $UserStoreData = new UserStoreData($UserStoreObject->getArrayData());
            $user = $UserStoreData->createUser();
            $credentials = $request->only('email', 'password');
            $token = JWTAuth::attempt($credentials);
              try {
                if (! $token) {
                  return ResponseJson::danger(['danger'=> 'Ocurrio un error creando el token de autenticaciòn del usuario...intentelo nuevamente']);
                }
            } catch (JWTException $e) {
                return ResponseJson::danger(['danger'=>'No se pudo crear el token de autenticaciòn... intentelo de nuevo']);
            }
            $payload = JWTAuth::setToken($token)->getPayload();
            $expire_session = date('d/m/Y h:i', $payload->get('exp'));
            DB::commit();
            $message = 'Usuario creado exitosamente...se redirigira al dashboard';
            return ResponseJson::successCreated(['success'=> $message],
            [
              'access_token' => $token,
              'expire_session' => $expire_session,
              'user_id' => $user->id,
              'full_name' => $user->name.' '.$user->last_name
            ]
          );
        } catch (\Trowable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
