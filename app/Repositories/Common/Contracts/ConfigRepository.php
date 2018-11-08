<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/5
 * Time: 13:57
 */
namespace App\Repositories\Common\Contracts;

use App\Models\ConfigModel;

interface ConfigRepository
{
    /**
     * 根据标识获取配置
     * @param $name string 英文标识
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getConfigByName($name);
}