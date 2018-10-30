<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:48
 */
namespace App\Services;

use App\Repositories\User\Contracts\AdminUserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginService
{
    /**
     * @var AdminUserRepository
     */
    private $adminUserRepository;

    public function __construct(AdminUserRepository $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    /**
     * 注册
     * @param $name
     * @param $phone
     * @param $pwd
     * @return bool
     */
    public function register($name, $phone, $pwd)
    {
        try {
            DB::transaction(function () use ($name, $phone, $pwd) {
                $pwd = encryptPwd($pwd);
                $this->adminUserRepository->addUser($name, $phone, $pwd);

            });
            return true;
        } catch (\Exception $exception) {
            Log::error("用户{$name}，手机号{$phone}，密码{$pwd}注册失败，失败原因{$exception->getMessage()}");
            return false;
        }
    }
}