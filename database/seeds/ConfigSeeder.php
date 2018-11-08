<?php

use Illuminate\Database\Seeder;
use Yoha\Data\Models\ConfigModel;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => '登录错误次数限制',
                'tag' => 'LOGIN_ERROR_TIMES_LIMIT',
                'value' => 3
            ],
            [
                'name' => '多次登录失败，锁定时间（分钟）',
                'tag' => 'LOGIN_MANY_ERROR_LOCK_TIME',
                'value' => 30
            ],
            [
                'name' => '连续多次登录失败的锁定间隔时间（比如半个小时连续错误--分钟）',
                'tag' => 'LOGIN_ERROR_GAP_TIME',
                'value' => 15
            ],
            [
                'name' => '登录过期时间（分钟）',
                'tag' => 'LOGIN_EXPIRE_TIME',
                'value' => 30
            ],
            [
                'name' => '记住密码过期时间（分钟）',
                'tag' => 'LOGIN_REMEMBER_EXPIRE_TIME',
                'value' => 300
            ]
        ];

        ConfigModel::query()
            ->insert($data);
    }
}
