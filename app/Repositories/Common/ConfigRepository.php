<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/5
 * Time: 13:59
 */
namespace App\Repositories\Common;

use Yoha\Data\Models\ConfigModel;
use App\Repositories\Common\Contracts\ConfigRepository as Repository;

class ConfigRepository implements Repository
{
    /**
     * 根据标识获取配置
     * @param $name string 英文标识
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getConfigByName($name)
    {
        return ConfigModel::query()
            ->where('tag', $name)
            ->get();
    }
}