<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
/**
 * App\Models\Goods
 *
 * @property int $id
 * @property string $goods_name 商品名称
 * @property float $goods_price 商品价格
 * @property string|null $description 描述
 * @property string|null $introduce 简介
 * @property string|null $thumb 封面
 * @property int|null $cat_id 分类ID
 * @property int $views 浏览量
 * @property int|null $difficulty 难度
 * @property string|null $notice 须知
 * @property int|null $sort 排序
 * @property string|null $content 内容
 * @property int $add_time 上架时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereDifficulty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereIntroduce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Goods whereViews($value)
 * @mixin \Eloquent
 */
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
       return $this->leftJoin('category as cat','goods.cat_id','=','cat.id')->where($where)->select('goods.*','cat.name as cat_name','cat.thumb as cat_img','cat.color')->paginate(10);
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
        $data['difficulty'] = $request->difficulty;
        $data['copyfrom'] = $request->copyfrom;
        $data['sort'] = intval($request->sort);
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
        $data['difficulty'] = $request->difficulty;
        $data['copyfrom'] = $request->copyfrom;
        $data['sort'] = intval($request->sort);
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
     * 商品信息
     * @param $goods_id
     * @return mixed
     */
    public function goodsInfo($goods_id){
        return $this->leftJoin('category as cat','goods.cat_id','=','cat.id')->where('goods.id',$goods_id)->select('goods.*','cat.name as cat_name')->first();
    }


    public function content($goods_id,$data){
        $str = '';
        foreach ($data as $v){
          $str.=  '<img src="'.asset($v['local_path']).'"/>';
        }

        $this->where('id',$goods_id)->update(['content'=>$str]);
    }


}
