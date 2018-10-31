<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class NewsController extends Controller
{
    /**
     * 文章列表
     * @param AdminService $adminService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(NewsService $newsService){
        return view('console.news.index',array('list'=>$newsService->getList())) ;
    }

    /**
     * 删除
     * @param Request $request
     * @param BannerService $bannerService
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function del(Request $request, NewsService $newsService){
        $newsService->del($request->id);
        return redirect(route('admin.news.index'));
    }


    /**
     * 添加
     * @return $this
     */
    public function add(){
        $position = News::$position;
        return view('console.news.add')->with('position',$position);
    }


    /**
     * 添加文章
     * @param Request $request
     * @param BannerService $bannerService
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doAdd(Request $request, NewsService $newsService){

        $validator  = Validator::make($request->all(), [
            'title' => 'required',
        ],[
            'title'  => '标题必填',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.news.add'))->withErrors($validator)->withInput();
        }

        if ($request->hasFile('thumb')) {
            $img = $request->file('thumb');
            // 获取后缀名
            $ext = $img->extension();
            // 新文件名
            $saveName =time().rand().".".$ext;
            $file =  $img ->move('./upload/news',$saveName);
            $request->thumb  = $file->getPathname();
        }
        $newsService->add($request);
        return redirect(route('admin.news.index'));
    }




}
