<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Wap;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Toplan\Sms\Facades\SmsManager;


class AccountController extends Controller{


    /**
     * 登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        return view('wap.account.login');
    }

    public function check(Request $request,UserService $userService){
//验证数据
        $validator = Validator::make($request->all(), [
            'mobile'     => 'bail|required|confirm_mobile_not_change',
            //'code' => 'bail|required|verify_code',
            //more...
        ],[
            'mobile.required'=>'手机号必填',
            'mobile.confirm_mobile_not_change'=>'请先获取验证码',
            'code.required'=>'验证码必填',
            'code.verify_code'=>'验证码错误',
        ]);


        if ($validator->fails()) {
            //验证失败后建议清空存储的发送状态，防止用户重复试错
            SmsManager::forgetState();
          //  return redirect()->back()->withErrors($validator);
            $validator->errors()->add('status', 10020);
            return response()->json($validator->errors());
        }

        return $userService->loginOrRegister($request);

    }


}