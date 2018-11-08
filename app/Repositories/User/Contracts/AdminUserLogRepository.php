<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/5
 * Time: 15:15
 */
namespace App\Repositories\User\Contracts;

interface AdminUserLogRepository{
    /**
     * 添加日志
     * @param $userId
     * @param $url
     * @param $request
     * @param $response
     * @param $remark
     * @return int|mixed
     */
    public function addUserLog($userId, $url, $request, $response, $remark);
}