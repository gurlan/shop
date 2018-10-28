<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * 管理员列表
     * @param AdminService $adminService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AdminService $adminService){
        return view('console.admin.index',array('admins'=>$adminService->adminList())) ;
    }

    public function edit(AdminService $adminService){
        $data = $adminService->adminInfo(Auth::guard('admin')->id());
        return view('console.admin.edit',array('data'=>$data)) ;
    }

    public function doEdit(Request $request,AdminService $adminService){
        $validator  = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ],[
            'password.required'  => '密码必填',
            'password.min'  => '密码最少6位',
        ]);
        if ($validator->fails()) {
            return redirect(route('admin.admin.edit'))->withErrors($validator)->withInput();
        }
        //修改密码
        $adminService->password(Auth::guard('admin')->id(),$request->input('password'));

        return redirect(route('admin.admin.index'));
    }

}
