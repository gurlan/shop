<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Services\BannerService;
use App\Services\GoodsService;
use Illuminate\Http\Request;


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
            $request->image = $request->file('image')->store('banner');
        }else{
            $position = Banner::$position;
            return view('console.banner.add')->with('error','图片不能为空')->with('position',$position);
        }

        $img = $request->file('image');


        $path = $img->store(date('Ymd'));


        $bannerService->add($request);
        return redirect(route('admin.banner.index'));
    }




}
