<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Wap;
use App\Http\Controllers\Controller;


class CouponController extends Controller{


    /**
     * 优惠券
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){




        return view('wap.coupon.index');
    }



}