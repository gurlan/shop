<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\admin
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{

    protected $table = 'admin';
    public $timestamps = false; //不维护时间戳
    public function adminList(){
      return  $this->paginate(10);
    }

    /**
     * 记录登录时间
     * @param $id
     */
    public function login($id){
        $this->where('id',$id)->update(['last_login'=>time()]);
    }

    /**
     * 返回管理员信息
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function adminInfo($id){

        return $this->where('id',$id[0])->first();
    }

    /**
     * 修改密码
     * @param $id
     * @param $password
     * @return bool
     */
    public function password($id, $password){
      return  $this->where('id',$id)->update(['password'=>$password]);
    }

}
