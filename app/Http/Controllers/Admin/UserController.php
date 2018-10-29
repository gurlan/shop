<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Services\UserCouponService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{


    /**
     * 会员列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserService $userService){
        $list = $userService->getList();
        return view('console.user.index')->with('list',$list);
    }

    /**
     * 删除会员
     * @param Request $request
     * @param UserService $userService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function del(Request $request, UserService $userService){
        $userService->del($request->id);
        return redirect(route('console.user.index'));
    }


    /**
     * 用户代金券列表
     * @param UserCouponService $userCouponService
     * @return $this
     */
    public function coupon(UserCouponService $userCouponService){
        $list = $userCouponService->getList();

        return view('console.user.coupon')->with('list',$list);
    }




}