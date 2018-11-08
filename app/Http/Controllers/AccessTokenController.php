<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/6
 * Time: 10:58
 */
namespace  App\Http\Controllers;

use Illuminate\Http\Request;

class AccessTokenController extends Controller
{
    public function __construct()
    {
    }

    public function getToken(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $url = url('oauth/token');

        $data = [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => config('auth.oauth_client.client_id'),
                'client_secret' => config('auth.oauth_client.client_secret'),
                'username' => 'brucelli',
                'password' => '123456',
                'scope' => '',
            ],
        ];
        $response = $http->post($url, $data);
        dd($data, json_decode((string) $response->getBody(), true));
    }
}