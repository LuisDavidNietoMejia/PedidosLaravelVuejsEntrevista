<?php namespace PedidosLaravelVue\Http\Library;

use PedidosLaravelVue\Http\Library\RJson;
use PedidosLaravelVue\Http\Library\Result;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResponseJson
{
    private static $successStatus = 200;
    private static $unauthorized = 401;
    private static $successStatusCreated = 201;
    private static $errorRequest = 400;
    private static $errorNotfound = 404;
    private static $dangerStatusServer = 500;
    private static $forbidden = 403;
    private static $header = array (
         'Content-Type' => 'application/json; charset=UTF-8',
         'charset' => 'utf-8'
        );
    //para request personalizados:

    public static function forbidden($message = '', $name_route_redirect = null)
    {
        $result = Result::error($message, self::$forbidden);

        return response()->json($result, self::$forbidden, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }

    public static function errorRequest($message, $request = null, $rules = null)
    {
        $result = Result::errorRequest($message, self::$errorRequest, $request, $rules);
        throw new HttpResponseException(response()->json($result, self::$errorRequest, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
    }

    public static function notFound($message)
    {
        $result = Result::error($message, self::$errorNotfound);
        throw new HttpResponseException(response()->json($result, self::$errorNotfound, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
    }

    public static function danger($message = '')
    {
        $result = Result::error($message, self::$dangerStatusServer);
        return response()->json($result, self::$dangerStatusServer, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }

    public static function unauthorized($message = '', $name_route_redirect = null)
    {
        $result = Result::error($message, self::$unauthorized, $name_route_redirect);
        return response()->json($result, self::$unauthorized, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }

    public static function success($message = '', $result = null, $compresed = false)
    {
        if ($result != null) {
            // if($compresed == true){
            //   $data = [];
            //   foreach ($result as $key => $value) {
            //     $data[$key] =  RJson::pack($result[$key]);
            //   }
            //   dd($data);
            //   $pack = RJson::pack($result);
            //   dd($pack);
              // $result = Result::success($message, self::$successStatus, $result);
            // }
            // else{
               $result = Result::success($message, self::$successStatus, $result);
            // }
        } else {
            $result = Result::success($message, self::$successStatus);
        }
        return response()->json($result, self::$successStatus, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }
    public static function successCreated($message = '', $result = null, $compresed = false)
    {
        if ($result != null) {
            if($compresed == true){
                $pack = RJson::pack($result);
                $result = Result::success($message, self::$successStatusCreated, $pack);
            }
            else{
              $result = Result::success($message, self::$successStatusCreated, $result);
            }
        } else {
            $result = Result::success($message, self::$successStatusCreated);
        }
        return response()->json($result, self::$successStatusCreated, self::$header, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }
}
