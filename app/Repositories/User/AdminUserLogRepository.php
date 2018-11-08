<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/5
 * Time: 15:16
 */
namespace App\Repositories\User;

use Yoha\Data\Models\AdminUserLogModel;
use App\Repositories\User\Contracts\AdminUserLogRepository as Repository;

class AdminUserLogRepository implements  Repository
{

    /**
     * 添加日志
     * @param $userId
     * @param $url
     * @param $request
     * @param $response
     * @param $remark
     * @return int|mixed
     */
    public function addUserLog($userId, $url, $request, $response, $remark)
    {
        $data = [
            'user_id' => $userId,
            'url' => $url,
            'request' => $request,
            'response' => $response,
            'remark' => $remark
        ];

        return AdminUserLogModel::query()
            ->insertGetId($data);
    }
}