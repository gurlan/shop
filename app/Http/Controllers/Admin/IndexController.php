<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller{


    /**
     * 后台首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
    //测试git
        return view('admin.index.index');
    }



}