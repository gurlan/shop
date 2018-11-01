<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Wap;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class UserController extends Controller{


    public function index(){
        return view('wap.user.index');
    }




}