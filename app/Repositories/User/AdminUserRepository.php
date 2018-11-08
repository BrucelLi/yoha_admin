<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:38
 */
namespace App\Repositories\User;

use Yoha\Data\Models\AdminUserModel;
use App\Repositories\User\Contracts\AdminUserRepository as Repository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AdminUserRepository implements Repository
{
    /**
     * 添加用户
     * @param $name string 用户名
     * @param $phone string 用户手机号
     * @param $pwd string 密码
     * @return int
     */
    public function addUser($name, $phone, $pwd)
    {
        $data = [
            'name' => $name,
            'phone' => $phone,
            'password' => $pwd
        ];

        return AdminUserModel::query()
            ->insertGetId($data);
    }

    /**
     * 根据Id获取用户
     * @param $id integer id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getUserById($id)
    {
        return AdminUserModel::query()
            ->where('id', $id)
            ->first();
    }

    /**
     * 根据用户名和密码获取用户
     * @param $name string 用户名
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getUserByPwd($name)
    {
        return AdminUserModel::query()
            ->where('username', $name)
            ->where('status', AdminUserModel::YOHA_ADMIN_USER_STATUS_ON)
            ->first();
    }

    /**
     * 登录后更新用户信息
     * @param $name string 名称
     * @param $loginTime integer 登录次数
     * @param $token string token
     * @return int
     */
    public function loginUpdate($name, $loginTime, $token)
    {
        $data = [
            'auth_token' => $token,
            'last_login_time' => Carbon::now(),
            'login_time' => $loginTime + 1
        ];

        $res =  AdminUserModel::query()
            ->where('username', $name)
            ->update($data);

        Log::info("test : {$res}->{$name}->",$data);
        return $res;
    }
}