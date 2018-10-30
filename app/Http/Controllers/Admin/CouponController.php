<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Services\CouponService;
use App\Services\UserService;
use Illuminate\Http\Request;


class CouponController extends Controller{


    /**
     * 代金券列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CouponService $couponService){
        $list = $couponService->getList();
        return view('console.coupon.index')->with('list',$list);
    }

    /**
     * 删除会员
     * @param Request $request
     * @param UserService $userService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function del(Request $request, UserService $userService){
        $userService->del($request->id);
        return redirect(route('admin.user.index'));
    }

    



}