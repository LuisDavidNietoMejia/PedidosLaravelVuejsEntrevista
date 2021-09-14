<?php

namespace PedidosLaravelVue\Http\Library;

use Auth;
use DB;
use Route;
use PedidosLaravelVue\UserReward;
use Illuminate\Support\Str;

class Result
{
    private static $result = array('success' => false, 'code' => 0, 'message' => '', 'name_route_redirect' => null);

    public static function error($message = '', $code = 0, $name_route_redirect = null)
    {
        self::$result['message'] = $message;
        self::$result['code'] = $code;
        self::$result['name_route_redirect'] = $name_route_redirect;
        self::debugUser();
        return self::$result;
    }

    public static function errorRequest($message = '', $code = 0, $request = null, $rules)
    {
        self::$result['message'] = $message;
        self::$result['code'] = $code;
        self::$result['request'] = $request;
        self::$result['rules'] = $rules;
        self::debugUser();
        return self::$result;
    }

    public static function success($message = '', $code = 1, $result = null, $name_route_redirect = null)
    {
        self::$result['message'] = $message;
        self::$result['code'] = $code;
        self::$result['success'] = true;
        self::$result['result'] = $result;
        self::$result['name_route_redirect'] = $name_route_redirect;
        self::debugUser();
        self::rewardKey();
        return self::$result;
    }

    public static function debugUser()
    {
        if (Auth::user()) {
            if (Auth::user()->email == 'luisdavidnietomejia@gmail.com') {
                if (config('app.debug') == true) {
                    self::$result['route_details'] = Route::current()->action['controller'];
                    if (array_key_exists('as', Route::current()->action)) {
                        self::$result['route_name'] = Route::current()->action['as'];
                    }
                }
            }
        }
    }

    public static function rewardKey()
    {
        $routesCredit = [
          'school.update',
          'user.update.profile',
          'email.send.type',
          'grade.store',
          'grade.update',
          'course.store',
          'course.update',
          'modules.store',
          'modules.update',
          'user.add.role.existing.assistant',
          'user.add.role.existing.administrator',
          'user.add.role.existing.teacher',
          'assistant.store',
          'assistant.update',
          'administrator.store',
          'administrator.update',
          'teacher.store',
          'teacher.update',
          'teacher.add.grade',
          'teacher.add.course',
          'teacher.disable.grade',
          'teacher.enabled.grade',
          'teacher.disable.course',
          'theme.store',
          'theme.update',
          'student.update',
          'student.disable.grade',
          'student.enabled.grade',
          'students.course.massive.add',
          'pdf.theme.point.google.drive.store',
          'pdf.theme.point.link.store',
          'slideshow.theme.point.store',
          'slideshow.theme.point.update',
          'slideshow.theme.point.destroy',
          'video.theme.point.store',
          'video.theme.point.youtube.store',
          'video.theme.point.destroy',
          'video.mark.store',
          'video.mark.destroy',
          'video.discussion.theme.point.store',
          'video.discussion.theme.point.destroy',
          'video.interactive.theme.point.store',
          'video.interactive.theme.point.destroy',
          'video.interactive.mark.store',
          'video.interactive.mark.update',
          'video.interactive.mark.destroy',
          'question.theme.point.destroy',
          'question.theme.point.update',
          'question.theme.point.store',
          'inscription.store',
          'inscription.update',
          'lesson.instruction.store',
          'lesson.instruction.destroy',
          'lesson.instruction.update',
          'lesson.comment.store',
          'lesson.comment.update',
          'lesson.comment.destroy',
          'lesson.activity.store',
          'lesson.activity.individual.store',
          'lesson.update',
          'lesson.finalize',
          'schedule.store',
        ];

        if (array_key_exists('as', Route::current()->action)) {
            if (in_array(Route::current()->action['as'], $routesCredit)) {
                $UserReward = UserReward::where('user_id', '=', Auth::user()->id)->first();
                if ($UserReward != null) {
                    $UserReward->expiration_key = Str::random(40);
                    $UserReward->count = $UserReward->count + 1;
                    $UserReward->expired_date =\Carbon\Carbon::now()->addSeconds(5);
                    $UserReward->save();
                    if ($UserReward->wasRecentlyCreated != true) {
                        self::$result['key_reward'] = $UserReward->expiration_key;
                    }
                } else {
                    $UserReward = new UserReward();
                    $UserReward->user_id = Auth::user()->id;
                    $UserReward->expiration_key = Str::random(40);
                    $UserReward->count = 1;
                    $UserReward->expired_date =\Carbon\Carbon::now()->addSeconds(5);
                    $UserReward->save();
                    if ($UserReward->wasRecentlyCreated != true) {
                        self::$result['key_reward'] = $UserReward->expiration_key;
                    }
                }
            }
        }
    }
}
