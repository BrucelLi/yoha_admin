<?php
/**
 * Created by PhpStorm.
 * User: xty
 * Date: 2016/6/29
 * Time: 14:14
 *
 * @desc 扩展验证类
 */

namespace App\Extensions;

use App\Extensions\Traits\IdCardTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Validator;

class MyValidator extends Validator
{
    use IdCardTrait;

    /**
     * 手机号的验证
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     *
     * @return bool
     */
    public static function validateMobile($attribute, $value, $parameters)
    {
        if (preg_match("/^1[34578]{1}\d{9}$/", $value)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 身份证号码有效性检验
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     *
     * @return bool
     */
    public static function validateIdCard($attribute, $value, $parameters)
    {
        $idCard = str_replace(' ', '', (string)$value);
        if (strlen($idCard) === 18) {
            return self::idCardChecksum18($idCard);
        } elseif ((strlen($idCard) === 15)) {
            return false;
            //$idCard = self::idCard15To18($idCard);

            //return self::idCardChecksum18($idCard);
        } else {
            return false;
        }
    }

    /**
     * 中文名的验证
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     *
     * @return bool
     */
    public static function validateChineseName($attribute, $value, $parameters)
    {
        $name = $value;
        $nameLen = strlen($name);
        if ($nameLen < 2 || $nameLen > 20) {
            return false;
        }
        if (preg_match('/^[\x{4e00}-\x{9fa5}]{1}([·]?[\x{4e00}-\x{9fa5}]{0,5}){0,3}([\x{4e00}-\x{9fa5}])+$/u', $name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 验证输入值不可小于某个验证值
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     *
     * @return bool
     */
    public static function validateGreaterThan($attribute, $value, $parameters)
    {
        $valueType = gettype($value);
        switch ($valueType) {
            case 'string':
                if (is_numeric($value)) {
                    $size = $value;
                } else {
                    $size = strlen($value);
                }
                break;
            case 'integer':
            case 'double':
                $size = $value;
                break;
            default:
                return false;
        }
        if ($size <= $parameters[0]) {
            return false;
        }

        return true;
    }

    /**
     * 验证码
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public static function validateCaptcha($attribute, $value, $parameters)
    {
        $cacheKey = $value;
        $keyValue = Cache::get($cacheKey);
        Cache::forget($cacheKey);
        if ($keyValue == $value) {
            return true;
        } else {
            return false;
        }
    }
}
