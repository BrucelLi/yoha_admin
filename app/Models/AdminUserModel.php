<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/30
 * Time: 15:17
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserModel extends Model
{
    // 状态 status
    const YOHA_ADMIN_USER_STATUS_APPLY = 1;         // 申请
    const YOHA_ADMIN_USER_STATUS_ON = 2;            // 启用
    const YOHA_ADMIN_USER_STATUS_OFF = 3;           // 禁用
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admin_user';

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',                    // 手机号
        'name',                     // 昵称
        'password',                 // 密码
        'remember_token',           // 记住登录
        'group',                    // 分组
        'status',                   // 状态
        'last_login_time',          // 上次登录时间
        'login_time',               // 登录次数
        'created_at',               // 创建时间
        'updated_at'                // 修改时间
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * 主键的设置
     *
     * @var string
     */
    protected $primaryKey = 'id';
}