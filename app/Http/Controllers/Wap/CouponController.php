<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Wap;
use App\Http\Controllers\Controller;
use App\Models\UserCoupon;
use App\Services\CouponService;
use Illuminate\Support\Facades\Auth;


class CouponController extends Controller{


    /**
     * 优惠券
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CouponService $couponService){

         $flag = 1; //新人标记
         if($couponService->getFlag(Auth::id())){
             $flag = 0;
         }

        //优惠券列表
         $coupon = $couponService->getList();

         return view('wap.coupon.index')->with('flag',$flag)->with('coupon',$coupon);
    }

    /**
     * 领取优惠券
     * @param CouponService $couponService
     */
    public function getCoupon(CouponService $couponService,UserCoupon $userCoupon){
        if($couponService->getFlag(Auth::id())){
            $res['result'] = '-1';
            return $res;
        }

        $coupon = $couponService->getList();
        foreach($coupon as $k=>$v){
            $data[$k]['coupon_id'] = $v['id'];
            $data[$k]['user_id'] = Auth::id();
            $data[$k]['add_time'] = time();
            $data[$k]['out_time'] = time()+86400*7;
            $data[$k]['status'] = 0;
        }

        $userCoupon->insert($data);

        $res['result'] = 0;

        return $res;
    }



}