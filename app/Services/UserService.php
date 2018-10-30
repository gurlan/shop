<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected  $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getList($where = array()){
       return $this->user->getList($where);
    }

    public function del($user_id){
        return $this->user->del($user_id);
    }


}