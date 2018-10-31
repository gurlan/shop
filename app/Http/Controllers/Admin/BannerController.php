<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Services\BannerService;
use App\Services\GoodsService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BannerController extends Controller
{
    /**
     * 广告列表
     * @param AdminService $adminService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(BannerService $bannerService){
        return view('console.banner.index',array('list'=>$bannerService->getList())) ;
    }

    /**
     * 删除
     * @param Request $request
     * @param BannerService $bannerService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function del(Request $request, BannerService $bannerService){
        $bannerService->del($request->id);
        return redirect(route('admin.banner.index'));
    }

    /**
     * 添加
     * @return $this
     */
    public function add(){
        $position = Banner::$position;
        return view('console.banner.add')->with('position',$position);
    }


    /**
     * 添加广告
     * @param Request $request
     * @param BannerService $bannerService
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doAdd(Request $request, BannerService $bannerService){
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            // 获取后缀名
            $ext = $img->extension();
            // 新文件名
            $saveName =time().rand().".".$ext;

             $file =  $img ->move('./upload/banner',$saveName);
            $request->image  = $file->getPathname();
            $request->image  = str_replace('./','/',str_replace('\\','/',$request->image));
        }else{
            $position = Banner::$position;
            return view('console.banner.add')->with('error','图片不能为空')->with('position',$position);
        }

        $bannerService->add($request);
        return redirect(route('admin.banner.index'));
    }




}
