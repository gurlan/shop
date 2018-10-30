<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CouponService
{
    protected  $user;
    protected  $coupon;
    public function __construct(User $user,Coupon $coupon)
    {
        $this->user = $user;
        $this->coupon = $coupon;
    }

    public function getList($where = array()){
       return $this->coupon->getList($where);
    }

    public function del($user_id){
        return $this->user->del($user_id);
    }


}