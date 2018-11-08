<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/6
 * Time: 11:47
 */
namespace App\Util;

use Illuminate\Support\Facades\Log;

class OAuth2
{
    /**
     * @var string
     */
    private $grant_type;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $client_id;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $client_secret;

    /**
     * OAuth2 constructor.
     * @param string $type
     */
    public function __construct($type = 'password')
    {
        $this->grant_type = $type;
        if ($type == 'password') {
            $this->client_id = config('auth.oauth_client.password.client_id');
            $this->client_secret = config('auth.oauth_client.password.client_secret');
        }
    }

    /**
     * 根据用户名和密码获取token
     * @param $name string 用户名或者手机号
     * @param $pwd string 密码
     * @param string $scope
     * @return bool
     */
    public function getTokenByPassword($name, $pwd, $scope= '')
    {
        $url = url('oauth/token');
        $data = [
            'form_params' => [
                'grant_type' => $this->grant_type,
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'username' => $name,
                'password' => $pwd,
                'scope' => $scope,
            ],
        ];

        $res = $this->post($url, $data);

        if (!isset($res['access_token'])) {
            return false;
        }

        return $res['access_token'];
    }

    /**
     * 发送post请求
     * @param $url
     * @param $data
     * @return bool|mixed
     */
    protected function post($url, $data)
    {
        try {
            $http = new \GuzzleHttp\Client;
            $response = $http->post($url, $data);
            if ($response->getStatusCode() == 200) {
                return json_decode((string) $response->getBody(), true);
            } else {
                Log::error("发送请求失败:", $response->getBody());
                return false;
            }
        } catch (\Exception $exception) {
            Log::error("发送请求失败；{$exception->getMessage()}");
            return false;
        }
    }

    /**
     * 发送get请求
     * @param $url
     * @param $data
     * @return bool|mixed
     */
    protected function get($url, $data)
    {
        try {
            $query = http_build_query($data);
            $url = $url . "?{$query}";
            $http = new \GuzzleHttp\Client;
            $response = $http->get($url);
            if ($response->getStatusCode() == 200) {
                return json_decode((string) $response->getBody(), true);
            } else {
                Log::error("发送请求失败:", $response->getBody());
                return false;
            }
        } catch (\Exception $exception) {
            Log::error("发送请求失败；{$exception->getMessage()}");
            return false;
        }
    }
}