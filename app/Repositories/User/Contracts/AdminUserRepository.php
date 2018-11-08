<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:34
 */
namespace App\Repositories\User\Contracts;

interface AdminUserRepository
{
    /**
     * 添加用户
     * @param $name string 用户名
     * @param $phone string 用户手机号
     * @param $pwd string 密码
     * @return int
     */
    public function addUser($name, $phone, $pwd);

    /**
     * 根据Id获取用户
     * @param $id integer id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getUserById($id);

    /**
     * 根据用户名获取用户
     * @param $name string 用户名
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getUserByPwd($name);

    /**
     * 登录后更新用户信息
     * @param $name string 名称
     * @param $loginTime integer 登录次数
     * @param $token string 记住密码token
     * @return int
     */
    public function loginUpdate($name, $loginTime, $token);

}