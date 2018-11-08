<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:48
 */

namespace App\Services;

use App\Exceptions\ResponseCode;
use App\Repositories\User\Contracts\AdminUserLogRepository;
use App\Repositories\User\Contracts\AdminUserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    use ThrottlesLogins;
    /**
     * @var AdminUserRepository
     */
    private $adminUserRepository;
    /**
     * @var AdminUserLogRepository
     */
    private $adminUserLogRepository;

    public function __construct(AdminUserRepository $adminUserRepository, AdminUserLogRepository $adminUserLogRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
        $this->adminUserLogRepository = $adminUserLogRepository;
    }

    /**
     * 注册
     * @param $name
     * @param $phone
     * @param $pwd
     * @return bool
     */
    public function register($name, $phone, $pwd)
    {
        try {
            DB::transaction(function () use ($name, $phone, $pwd) {
                $pwd = Hash::make($pwd);
                $this->adminUserRepository->addUser($name, $phone, $pwd);
            });
            return true;
        } catch (\Exception $exception) {
            Log::error("用户{$name}，手机号{$phone}，密码{$pwd}注册失败，失败原因{$exception->getMessage()}");
            return false;
        }
    }

    /**
     * 登录
     * @param $name string 名字
     * @param $password string 密码
     * @return array
     */
    public function login($name, $password)
    {
        // 加锁
        $lockTimeKey = "login_lock_time_{$name}_{$password}";
        $lockTime = Cache::get($lockTimeKey);
        if (!empty($lockTime) && $lockTime < time()) {
            $time = (time() - $lockTime) / 60;
            return [
                'code' => ResponseCode::HTTP_RESPONSE_PASSWORD_MANG_ERROR,
                'message' => "账号被锁定，还需{$time}分钟解锁",
                'data' => ''
            ];
        }

        $key = "login_time_limit_{$name}_{$password}";
        $loginTimes = Cache::get($key);
        $configTimes = getSysConfig('LOGIN_ERROR_TIMES_LIMIT');
        if (!empty($loginTimes) && $loginTimes > getSysConfig('LOGIN_ERROR_TIMES_LIMIT')) {
            $locktime = getSysConfig('LOGIN_MANY_ERROR_LOCK_TIME');
            Cache::put($lockTimeKey, $locktime, (int)$locktime);
            return [
                'code' => ResponseCode::HTTP_RESPONSE_PASSWORD_MANG_ERROR,
                'message' => "密码错误超过{$configTimes}次,账号将被锁定{$locktime}分钟",
                'data' => ''
            ];
        }

        // 密码解密
        $user = $this->adminUserRepository->getUserByPwd($name);
        if (empty($user)) {
            return [
                'code' => ResponseCode::HTTP_RESPONSE_PASSWORD_MANG_ERROR,
                'message' => "账号还未审核通过，或者已经被禁用了",
                'data' => ''
            ];
        }
        $checkPwd = Hash::check($password, $user->password);

        if (empty($checkPwd)) {
            // 密码错误
            if (empty($loginTimes)) {
                $gapTime = getSysConfig('LOGIN_ERROR_GAP_TIME');
                Cache::put($key, 1, (int)$gapTime);
            } else {
                Cache::increment($key);
            }
            return [
                'code' => ResponseCode::HTTP_RESPONSE_PASSWORD_ERROR,
                'message' => '密码错误',
                'data' => ''
            ];
        }

        // 登录成功
        $token = getLoginToken($user->username, $password);
        $loginAfter = $this->afterLogin($user, $token);

        if (empty($loginAfter)) {
            return [
                'code' => ResponseCode::HTTP_RESPONSE_NOT_KNOW,
                'message' => '未知错误，请联系管理员',
                'data' => ''
            ];
        }

        return [
            'code' => ResponseCode::HTTP_RESPONSE_OK,
            'message' => 'OK',
            'data' => [
                'token' => "Bearer " .$token
            ]
        ];
    }

    /**
     * 登录成功之后
     * @param $user object
     * @param $token string
     * @return bool
     */
    private function afterLogin($user, $token)
    {
        if (empty($user) || empty($token)) {
            Log::error("登录失败，参数不完整");
            return false;
        }

        try {
            DB::transaction(function () use ($user, $token) {
                // 更新登录信息
                $this->adminUserRepository->loginUpdate($user->username, $user->login_time, $token);
                // 更新日志
                $this->adminUserLogRepository->addUserLog(
                    $user->id,
                    request()->fullUrl(),
                    json_encode(request()->all()),
                    '',
                    '登录日志'
                );
            });

            return true;
        } catch (Exception $exception) {
            Log::error("登录失败，未知错误：{$exception->getMessage()}");
            return false;
        }
    }
}