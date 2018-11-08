<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/5
 * Time: 15:52
 */
namespace App\Http\Middleware;

use App\Exceptions\ResponseCode;
use Yoha\Data\Models\AdminUserModel;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'api')
    {
        $authorization = $request->header('Authorization');
        if (empty($authorization)) {
            return $this->_error('未登录，请先登录！',ResponseCode::HTTP_RESPONSE_NOT_LOGIN);
        }

        if (Auth::guard($guard)->guest()) {
            return $this->_error('无效授权,请先登录', ResponseCode::HTTP_RESPONSE_NOT_LOGIN);
        }

        //检查帐号是否被禁用
        if (Auth::guard($guard)->user()->status == AdminUserModel::YOHA_ADMIN_USER_STATUS_OFF) {
            return $this->_error('帐号被禁用，请联系管理员开放权限!', ResponseCode::HTTP_USER_LOCK);
        }

        $authorization = str_replace("Bearer ", "", $authorization);
        $userAuthorization = Auth::guard($guard)->user()->auth_token;

        if ($authorization != $userAuthorization) {
            return $this->_error('登录过期,请重新登录!',ResponseCode::HTTP_RESPONSE_LOGIN_EXPIRE);
        }

        $checkPermission = $this->_authAfter();

        if (empty($checkPermission)) {
            return $this->_error('没有权限操作',ResponseCode::HTTP_RESPONSE_NOT_PERMISSION);
        }

        return $next($request);
    }

    private function _authAfter()
    {
        // 权限

        // 日志
        return true;
    }

    private function _error($msg, $code)
    {
        $data = [
            'code' => $code,
            'message' => $msg,
            'data' => ''
        ];
        return response()->json($data);
    }
}