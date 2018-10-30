<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Category;
use App\Models\Goods;


class GoodsService
{
    protected  $category;
    protected  $goods;

    public function __construct(Category $category,Goods $goods)
    {
        $this->category = $category;
        $this->goods = $goods;
    }

    /**
     * 取得商品列表
     * @param $pid
     * @return mixed
     */
    public function getList($where=array()){

       return $this->goods->getList($where);
    }


    /**
     * 添加商品
     * @param $request
     * @return mixed
     */
    public function add($request){

        return $this->goods->add($request);
    }

    /**
     * 删除
     * @param $goods_id
     */
    public function del($goods_id){
        return $this->goods->del($goods_id);
    }

    /**
     * 商品信息
     * @param $goods_id
     * @return mixed
     */
    public function goodsInfo($goods_id){
        return $this->goods->goodsInfo($goods_id);
    }


    public function edit($request){
        return $this->goods->edit($request);
    }

}