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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Toplan\Sms\Facades\SmsManager;
use phpCAS;


class AccountController extends Controller{


    /**
     * 登录视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        return view('wap.account.login');
    }

    /**
     * 退出
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(){
        Auth::logout();
        return redirect(route('wap.account.login'));
    }

    /**
     * 登录验证
     * @param Request $request
     * @param UserService $userService
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function check(Request $request, UserService $userService){
//验证数据
        $validator = Validator::make($request->all(), [
            'mobile'     => 'bail|required|confirm_mobile_not_change',
          //  'code' => 'bail|required|verify_code',
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

    public function cas(Request $request){

        $this->init_cas_client();
        $url = urlencode(env('CAS_CLIENT'));
        // dd($url);
        phpCAS::setServerLoginUrl(env('CAS_SERVER_LOGIN') . "?service=".$url);
        if (phpCAS::checkAuthentication()) {
            $account = phpCAS::getUser();

            dd($account);
        } else {
            phpCAS::forceAuthentication();
        }
    }


    /**
     * 初始化cas 客户端
     * User:xuml
     * 2018/5/11 12:18
     */
    protected  function init_cas_client(){
        // initialize phpCAS
        $casConfig = config('cas');

        //dd($casConfig);
        //phpCAS::client(CAS_VERSION_2_0,'服务地址',端口号,'cas的访问地址');
        phpCAS::client(CAS_VERSION_2_0,$casConfig['cas_hostname'],
            intval($casConfig['cas_port']),
            $casConfig['cas_uri'],FALSE);
        phpCAS::setDebug($casConfig['cas_debug']);
        //no SSL validation for the CAS server 不使用SSL服务校验
        phpCAS::setNoCasServerValidation();

        phpCAS::setSingleSignoutCallback("logoutCallback");
        phpCAS::setServerLogoutURL($casConfig['cas_logout']);

        phpCAS::handleLogoutRequests();

    }


}