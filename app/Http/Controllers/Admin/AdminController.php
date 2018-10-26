<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\AdminService;

class AdminController extends Controller
{
    /**
     * 管理员列表
     * @param AdminService $adminService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(AdminService $adminService){
        return view('admin.admin.index',array('admins'=>$adminService->adminList())) ;
    }

    public function edit(AdminService $adminService){
        $data = $adminService->adminInfo(\Auth::guard('admin')->id());

        return view('admin.admin.edit',array('data'=>$data)) ;
    }

}
