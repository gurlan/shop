<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    protected  $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    //如果没有对方方法，去model里找
    public function __call($name, $arguments)
    {
        $admin = new Admin();
        return $admin->$name($arguments);
    }

    /**
     * 修改密码
     * @param $id
     * @param $password
     * @param Admin $admin
     * @return mixed
     */
    public function password($id, $password){
        $password = Hash::make($password);
        return $this->admin->password($id,$password);
    }


}