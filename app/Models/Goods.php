<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Goods extends Model
{

    protected $table = 'goods';

    public $timestamps = false;

    /**
     * 商品列表
     * @param array $where
     * @return mixed
     */
    public function getList($where = array()){
       return $this->leftJoin('category as cat','goods.cat_id','=','cat.id')->where($where)->select('goods.*','cat.name as cat_name')->paginate(10);
    }


    /**
     * 添加商品
     * @param $request
     * @return mixed
     */
    public function add($request){
        $data['goods_name'] = $request->goods_name;
        $data['goods_price'] = $request->goods_price;
        $data['description'] =$request->description;
        $data['introduce'] =$request->introduce;
        $data['content'] =$request->content;
        $data['notice'] =$request->notice;
        $data['thumb'] = $request->thumb;
        $data['cat_id'] = $request->cat_id;
        $data['difficulty'] = $request->level;
        $data['sort'] = $request->sort;
        $data['add_time'] = time();
        return $this->insert($data);
    }

    /**
     * 修改
     * @param $request
     * @return mixed
     */
    public function edit($request){
     
        $data['goods_name'] = $request->goods_name;
        $data['goods_price'] = $request->goods_price;
        $data['description'] = $request->description;
        $data['introduce'] = $request->introduce;
        $data['content'] = $request->content;
        $data['notice'] =$request->notice;
        $data['thumb'] = $request->thumb;
        $data['cat_id'] = $request->cat_id;
        $data['difficulty'] = $request->level;
        $data['sort'] = $request->sort;

        return $this->where('id',$request->id)->update($data);
    }

    /**
     * 删除
     * @param $goods_id
     */
    public function del($goods_id)
    {
        DB::transaction(function () use($goods_id){
            DB::table('goods')->where('id',$goods_id)->delete();
            DB::table('goods_address')->where('goods_id',$goods_id)->delete();
        });
    }

    /**
     * @param $goods_id
     * @return mixed
     */
    public function goodsInfo($goods_id){
        return $this->leftJoin('category as cat','goods.cat_id','=','cat.id')->where('goods.id',$goods_id)->select('goods.*','cat.name as cat_name')->first();
    }



}
