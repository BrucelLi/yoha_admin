<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 14:37
 */
namespace App\Exceptions;

final class ResponseCode
{
    // 正常响应
    const HTTP_RESPONSE_OK = 0;

    // 参数错误
    const HTTP_RESPONSE_PARAM_ERROR = 413;

    // 未登录
    const HTTP_RESPONSE_NOT_LOGIN = 530;

    // 登录过期
    const HTTP_RESPONSE_LOGIN_EXPIRE = 531;

    // 未知错误
    const HTTP_RESPONSE_NOT_KNOW = 560;
}