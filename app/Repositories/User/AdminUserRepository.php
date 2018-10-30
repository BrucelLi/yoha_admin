<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:38
 */
namespace App\Repositories\User;

use App\Models\AdminUserModel;
use App\Repositories\User\Contracts\AdminUserRepository as Repository;

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
}