<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Wap;
use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\GoodsService;
use App\Services\NewsService;


class IndexController extends Controller{


    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(BannerService $bannerService,NewsService $newsService,GoodsService $goodsService){

        $banner = $bannerService->getList(); //Banner
        $notice = $newsService->getList(['position'=>0]); //公告

        $recommend = $goodsService->getList(['is_recommend'=>1]); //推荐
        $new = $goodsService->getList(['is_new'=>1]); //新品



        return view('wap.index.index')->with('banner',$banner)->with('notice',$notice)->with('recommend',$recommend)->with('new',$new);
    }



}