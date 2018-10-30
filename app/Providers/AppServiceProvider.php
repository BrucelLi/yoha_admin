<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('app.sql_log')) {
            DB::listen(
                function ($sql, $bindings, $time) {
                    Log::info(PHP_EOL . '[SQL]' . $sql . " with: " . join(',', $bindings));
                }
            );
        }
        $this->extendValidator();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * 扩展Validator
     */
    private function extendValidator()
    {
        // 手机号
        Validator::extend(
            'mobile',
            function ($attribute, $value, $parameters) {
                return \App\Extensions\MyValidator::validateMobile($attribute, $value, $parameters);
            }
        );

        // 身份证号
        Validator::extend(
            'id_card',
            function ($attribute, $value, $parameters) {
                return \App\Extensions\MyValidator::validateIdCard($attribute, $value, $parameters);
            }
        );

        // 中文姓名
        Validator::extend(
            'chinese_name',
            function ($attribute, $value, $parameters) {
                return \App\Extensions\MyValidator::validateChineseName($attribute, $value, $parameters);
            }
        );

        // 不可小于某值
        Validator::extend(
            'greater_than',
            function ($attribute, $value, $parameters) {
                return \App\Extensions\MyValidator::validateGreaterThan($attribute, $value, $parameters);
            }
        );

        // 不可小于某值
        Validator::extend(
            'captcha',
            function ($attribute, $value, $parameters) {
                return \App\Extensions\MyValidator::validateCaptcha($attribute, $value, $parameters);
            }
        );
    }
}
