<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 13:58
 */

if (!function_exists('testLxl')) {
    function testLxl()
    {
        return 'test-lxl';
    }
}

if (!function_exists('encryptPwd')) {

    /**
     * 密码加密
     * @param $pwd 密码
     * @return bool|string
     */
    function encryptPwd($pwd)
    {
        $options = [
            'cost' => 12,
        ];
        return password_hash($pwd, PASSWORD_BCRYPT, $options);
    }
}

if (!function_exists('verifyPwd')) {
    /**
     * 验证密码
     * @param $pwd string 用户输入的密码
     * @param $hash string 数据库的密码
     * @return bool
     */
    function verifyPwd($pwd, $hash)
    {
        return password_verify($pwd, $hash);
    }
}