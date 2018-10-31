<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(
    [
        'namespace' => 'Admin',
        'prefix'    => 'admin',
    ],
    function () {
        // 不登录的路由组
        Route::group(
            [],
            function () {
                Route::get('/test', 'TestController@test');
                Route::get('/captcha', 'LoginController@getCaptcha');
                Route::post('/reg', 'LoginController@reg');
            }
        );
        // 需要登录验证的路由组
        Route::group(
            [
                'middleware' => 'auth:api'
            ],
            function () {
                Route::get('/user', 'TestController@test');
            }
        );
    }
);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
