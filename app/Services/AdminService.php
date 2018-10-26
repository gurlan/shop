<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Admin;

class AdminService
{

    //如果没有对方方法，去model里找
    public function __call($name, $arguments)
    {
        $admin = new Admin();
        return $admin->$name($arguments);
    }


}