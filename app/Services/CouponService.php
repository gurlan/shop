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

class CouponService
{
    protected  $user;
    protected  $coupon;
    protected  $userCoupon;
    public function __construct(User $user,Coupon $coupon,UserCoupon $userCoupon)
    {
        $this->user = $user;
        $this->coupon = $coupon;
        $this->userCoupon = $userCoupon;
    }

    public function getList($where = array()){
       return $this->coupon->getList($where);
    }

    public function del($user_id){
        return $this->coupon->del($user_id);
    }

    /**
     * 领券标记
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Model|null|object|static
     */
    public function getFlag($user_id){
        return $this->userCoupon->where('user_id',$user_id)->first();
    }


}