<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/24
 * Time: 20:08
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function __construct()
    {
    }

    public function test(Request $request)
    {
        $pwd = Hash::make('123456');

        dd($pwd);
    }

    public function getToken(Request $request)
    {
        $name = 'brucelli';
        $data = [
            'auth_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjliZGNmNjg5ZTVlNDRiMWNiODA1Mjk3OWRiNjAyZTk4N2RiMmRjODJhNDEwYTRkOWQxZTgxMjk4OTM0ODQwYmZmOTQ5OTMwMGExNjIxNzY3In0.eyJhdWQiOiIxIiwianRpIjoiOWJkY2Y2ODllNWU0NGIxY2I4MDUyOTc5ZGI2MDJlOTg3ZGIyZGM4MmE0MTBhNGQ5ZDFlODEyOTg5MzQ4NDBiZmY5NDk5MzAwYTE2MjE3NjciLCJpYXQiOjE1NDE0OTE3MTYsIm5iZiI6MTU0MTQ5MTcxNiwiZXhwIjoxNTczMDI3NzE2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.tdDzXd-0fdxNbCupRDEuKkByInzxWJjT350-zQ8bvJXefN05A-aFPdsRkKspZHeopYRnQyc9vB516enNW39JOX8Ox-ae6ds_CWl5yiExSqfKNSlM33akQnC2q6-EgkYtwYPP-bp_zAu5rHBCCFkEEEJDAZhyjzFjjfoBKDbvu3IAdxxKi9m5uMYzoLSQgcvut7-0F3K9CvIT3aj_qVT_EcGkqv1Brkclszrw5I4wOR0fz3yeoWOXOspBxfIvx69ierUbi7YVOE_2rZFIyAWG17EWqfy4yYpoF688FZGMvVQZgwnCVJ-zjmyYWKSlgbuXwQh8A8e5Y0DmaQbgHc4EbPFt7DQ-zZNDgjmuWnz-76GA87evJoNzQTdx03vvigRgQ7EQdwHY1o3UCbqhKj-hNU6gs8fHGoN4z_tgDQUB4R2ZQ_J3-8FX1NQa5R_ZC-KBLV8AhGQkNNorNExeBsEgfbzU0s2SaO-3Cp32YX9cmUxFw3bmxVZ9HOOpN96n-7Mq2Vfr--dQZcoL6zYc4a-TKBdQWW4BzeVqTQu3YsvmakLpu8dkdvY8JIzw3CucYABP3UhU1UZVaicRnusOnLz_JK6-G0x0AZI_sUCgzW5JuUDXajhe3Y4P3sILzekbSIFaJWF4FwmWiLqrgmXshYTgBiccAau4uIPYMJsz0Klb4fA',
            'last_login_time' => Carbon::now(),
            'login_time' => 5 + 1
        ];
        $res = AdminUserModel::query()
            ->where('username', $name)
            ->update($data);
        dd($res,333);
    }
}