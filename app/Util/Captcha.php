<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 14:04
 */
namespace App\Util;

use Gregwar\Captcha\PhraseBuilder;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Cache;

class Captcha
{
    private $builder;

    public function __construct()
    {
        $config = config("captcha.default");
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build($config['length']);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor($config['background_color']['r'], $config['background_color']['g'], $config['background_color']['b']);
        $builder->setMaxAngle($config['max_angle']);
        $builder->setMaxBehindLines($config['max_behind_lines']);
        $builder->setMaxFrontLines($config['max_front_lines']);
        // 可以设置图片宽高及字体
        $builder->build($config['width'], $config['height'], $font = null);
        $this->builder = $builder;
        // 获取验证码的内容
        $phrase = $builder->getPhrase();

        // 缓存
        $cacheKey = $phrase;
        Cache::put($cacheKey, $phrase, $config['active_time_m']);
    }

    /**
     * 返回图片资源
     */
    public function output()
    {
        $this->builder->output();
    }

    /**
     * 生成图片
     * @param $name string 图片的完整路径和名称
     */
    public function save($name)
    {
        $this->builder->save($name);
    }

    /**
     * 生成<img src='' />
     * @return string
     */
    public function inline()
    {
        return $this->builder->inline();
    }
}