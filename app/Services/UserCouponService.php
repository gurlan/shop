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
use App\Models\UserCoupon;
use Illuminate\Support\Facades\Hash;

class UserCouponService
{
    protected  $userCoupon;

    public function __construct(UserCoupon $userCoupon)
    {

        $this->userCoupon = $userCoupon;
    }

    public function getList($where = array()){
       return $this->userCoupon->getList($where);
    }

    public function del($user_id){
        return $this->user->del($user_id);
    }


}