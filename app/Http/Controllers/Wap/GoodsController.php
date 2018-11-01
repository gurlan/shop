<?php
/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/25
 * Time: 13:57
 */
namespace App\Http\Controllers\Wap;
use App\Http\Controllers\Controller;
use App\Services\GoodsService;
use Illuminate\Http\Request;


class GoodsController extends Controller{


    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,GoodsService $goodsService){

        $goodsInfo = $goodsService->goodsInfo($request->id);

        return view('wap.goods.index')->with('goods',$goodsInfo);

    }

    /**
     * 目录
     * @param Request $request
     * @param GoodsService $goodsService
     * @return $this
     */
    public function chapter(Request $request, GoodsService $goodsService){
        $directory = $goodsService->getDirectory($request->id);
        $goodsInfo = $goodsService->goodsInfo($request->id);
        return view('wap.goods.chapter')->with('chapter',$directory)->with('goods',$goodsInfo);
    }

    /**
     * 购买视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function buy(){
        return view('wap.goods.buy');
    }


}