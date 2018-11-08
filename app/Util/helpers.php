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

if (!function_exists('getSysConfig')) {
    /**
     * 获取配置
     * @param $name string 英文标识
     * @return mixed
     */
    function getSysConfig($name)
    {
        $configKey = "yoha_system_config10";
        $config = \Illuminate\Support\Facades\Cache::remember($configKey, 24*60, function () {
            return Yoha\Data\Models\ConfigModel::query()
                ->where('status',  Yoha\Data\Models\ConfigModel::YOHA_CONFIG_STATUS_ON)
                ->get();
        });

        $configV = $config->where('tag', $name)->first();

        return empty($configV) ? '' : $configV->value;
    }
}

if (!function_exists('getLoginToken')) {
    /**
     * 颁发登录token
     * @param $name string 名字
     * @param $pwd string 密码
     * @return string
     */
    function getLoginToken($name, $pwd) {
        return (new \App\Util\OAuth2())->getTokenByPassword($name, $pwd);
    }
}