<?php

namespace App\Http\Controllers\admin;

use App\Services\CategoryService;
use App\Services\GoodsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GoodsController extends Controller
{

    public static $level = ['入门','中级','高级'];

    /**
     * 商品列表
     * @param GoodsService $goodsService
     * @return $this
     */
    public function index(GoodsService $goodsService){

        $goods = $goodsService->getList();

        return view('console.goods.index')->with('goods',$goods);
    }

    /**
     * 添加商品页面
     * @param CategoryService $categoryService
     * @return $this
     */
    public function add(CategoryService $categoryService){
        $category = $categoryService->getList(0);
        $level = self::$level;
        return view('console.goods.add')->with('category',$category)->with('level',$level);
    }

    /**
     * 执行添加
     * @param Request $request
     * @param GoodsService $goodsService
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doAdd(Request $request, GoodsService $goodsService){

        $validator  = Validator::make($request->all(), [
            'goods_name' => 'required',
            'goods_price' => 'min:0',
        ],[
            'goods_name.required'  => '名称必填',
            'goods_price.min'  => '价格最小是0',
        ]);

        $request->flash();

        if ($validator->fails()) {
            return redirect(route('admin.goods.add'))->withErrors($validator)->withInput();
        }
        if ($request->hasFile('thumb')) {
            $request->thumb = $request->file('thumb')->store('thumb');

        }
        $goodsService->add($request);

        return redirect(route('admin.goods.index'));

    }

    public function delete(Request $request){

    }





}
