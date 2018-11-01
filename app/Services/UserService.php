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
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected  $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 获取用户列表
     * @param array $where
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($where = array()){
       return $this->user->getList($where);
    }

    /**
     * 删除用户
     * @param $user_id
     * @return bool|null
     */
    public function del($user_id){
        return $this->user->del($user_id);
    }


    /**
     * 登录或者注册
     * @param $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginOrRegister($request){
        $mobile = $request->mobile;
        if (Auth::attempt(['mobile' => $mobile],true)) {
            // 用户是激活状态，没有被暂停，而且存在
            $user_id = Auth::user()->id;
            $this->user->login_num($user_id);
            $res['status'] = 302;
            $res['url'] = $request->referer;
           return $res;
        }

      //  var_dump(Auth::attempt(['mobile' => $mobile]));


        $data['user_name'] = $this->generate_username();
        $data['mobile'] = $mobile;
        $data['add_time'] = time();
        $data['last_login'] = time();
        $data['password'] = Hash::make('');
        $data['login_num'] = 1;
        $this->user->insert($data);
        if (Auth::attempt(['mobile' => $mobile])) {
            // 用户是激活状态，没有被暂停，而且存在
            $res['status'] = 302;
            $res['url'] = $request->referer;
            return $res;
        }
    }

    /**
     * 生成随机用户名
     * @param int $length
     * @return string
     */
    private  function generate_username($length = 8 ) {
        // 密码字符集，可任意添加你需要的字符
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
        $password = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            // 这里提供两种字符获取方式
            // 第一种是使用substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组$chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $password;
    }

}