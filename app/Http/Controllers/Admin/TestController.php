<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/24
 * Time: 20:08
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
    }

    public function test(Request $request)
    {
        $data = [
            'code' => 0,
            'message' => 'OK',
            'data' => [
                'name' => 'lxl',
                'age' => 20
            ]
        ];
        //return response()->header('Access-Control-Allow-Origin','*')->json($data);
        return response($data)
            ->header('Access-Control-Allow-Origin','*')
            ->header('Content-Type', 'application/json');
    }
}