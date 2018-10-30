<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        $data['description'] = $request->description;
        $data['introduce'] = $request->introduce;
        $data['content'] = $request->content;
        $data['thumb'] = $request->thumb;
        $data['cat_id'] = $request->cat_id;
        $data['difficulty'] = $request->level;
        $data['sort'] = $request->sort;
        $data['add_time'] = time();
        return $this->insert($data);
    }

    public function del($goods_id)
    {
        DB::transaction(function () use($goods_id){
            $this->where('id',$goods_id)->delete();
            $this->table('goods_address')->where('goods_id',$goods_id)->delete();
        });
    }

}
