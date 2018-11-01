<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $user_name
 * @property string $password
 * @property string $mobile
 * @property string $email
 * @property int $add_time
 * @property int $login_num
 * @property int $last_login
 * @property int $pid
 * @property int $vip
 * @property string $remember_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLoginNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVip($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $table = 'user';

    /**
     * 用户列表
     * @param array $where
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($where = array()){
        return $this->where($where)->orderBy('id','desc')->paginate(10);
    }

    /**
     * 删除用户
     * @param $user_id
     * @return bool|null
     * @throws \Exception
     */
    public function del($user_id){
        return $this->where('id',$user_id)->delete();
    }




    /**
     * 登录次数
     * @param $user_id
     */
    public function login_num($user_id){
        $this->where('id',$user_id)->increment('login_num');
    }



}
