<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/29
 * Time: 13:45
 */

namespace App\Http\Controllers\Admin;

use App\Exceptions\ResponseCode;
use App\Http\Controllers\Controller;
use App\Services\LoginService;
use App\Util\Captcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    private $service;

    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    /**
     * 获取验证码
     * [getCaptcha description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCaptcha(Request $request)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new Captcha();
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /**
     * 注册
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function reg(Request $request)
    {
        $check = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'phone' => 'required|mobile|unique:admin_user,phone',
                'password' => 'required|string|confirmed',
                'password_confirmation' => 'required|string',
                'cap' => 'required|string|captcha'
            ],
            [
                'name.required' => '用户姓名不能为空',
                'name.string' => '用户姓名必须是字符串',

                'phone.required' => '手机号不能为空',
                'phone.mobile' => '手机号格式不正确',

                'password.required' => '密码不能为空',
                'password.string' => '密码必须是字符串',
                'password.confirmed' => '确认密码和密码不一致',

                'password_confirmation.required' => '确认密码不能为空',
                'password_confirmation.string' => '确认密码必须是字符串',

                'cap.required' => '验证码不能为空',
                'cap.string' => '验证码必须是字符串',
                'cap.captcha' => '验证码不正确',
            ]
        );

        if ($check->fails()) {
            return $this->error($check->errors()->first(), ResponseCode::HTTP_RESPONSE_PARAM_ERROR);
        }

        $res = $this->service->register(
            $request->input('name'),
            $request->input('phone'),
            $request->input('password')
        );

        if (empty($res)) {
            return $this->error('注册失败，请联系管理员！', ResponseCode::HTTP_RESPONSE_NOT_KNOW);
        }
        return $this->render('', '注册成功');
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|exists:admin_user,username',
                'password' => 'required|string|max:120',
                'cap' => 'required|string|captcha',
            ],
            [
                'name.required' => '用户姓名不能为空',
                'name.string' => '用户名必须是字符串',
                'name.exists' => '用户名不存在',

                'password.required' => '密码不能为空',
                'password.string' => '密码必须是字符串',
                'password.max' => '密码长度不能超过max',

                'cap.required' => '验证码不能为空',
                'cap.string' => '验证码必须是字符串',
                'cap.captcha' => '验证码不正确',
            ]
        );


        if ($validator->fails()) {
            return $this->error($validator->errors()->first(), ResponseCode::HTTP_RESPONSE_PARAM_ERROR);
        }

        $data = $this->service->login(
            $request->input('name'),
            $request->input('password')
        );

         if ($data['code'] != ResponseCode::HTTP_RESPONSE_OK) {
            return $this->error($data['message'], $data['code']);
        }
        return $this->render($data['data'], '登录成功');
    }

    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logOut(Request $request)
    {
        if (Auth::guard('api')->check()) {
            Auth::guard('api')->user()->token()->delete();
        }

        return $this->render('', '登出成功');
    }
}