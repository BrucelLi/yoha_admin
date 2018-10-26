<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/24
 * Time: 16:02
 */
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TestService
{
    public function __construct()
    {
    }

    public function testJob($msg)
    {
        Log::info("这是队列测试--{$msg}" . Carbon::now());
    }
}