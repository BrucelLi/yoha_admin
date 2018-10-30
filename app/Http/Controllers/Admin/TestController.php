<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/24
 * Time: 20:08
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function __construct()
    {
    }

    public function test(Request $request)
    {
        Log::info('test');
        dd(22);
    }
}