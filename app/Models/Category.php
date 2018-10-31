<?php

namespace App\Models;


/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $sort
 * @property int|null $pid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSort($value)
 * @mixin \Eloquent
 */
class Category extends BaseModel
{
    //
    protected $table = 'category';
    public $timestamps = false;

    /**分类列表
     * @param $pid
     * @return mixed
     */
    public function getList($pid){
       return $this->categoryList($pid);
    }

    /**
     * 返回分类结果
     * @param $pid
     * @return mixed
     */
    public function categoryList($pid,&$num=0){
       $tree =  $this->where('pid',$pid)->orderBy('sort','asc')->get()->toArray();
       if ($tree){
           $num++;
           foreach ($tree as $k=>$v) {
               $tree[$k]['child'] = $this->categoryList($v['id'],$num);
                   foreach ($tree[$k]['child'] as $key=>$value){
                       $tree[$k]['child'][$key]['name'] = str_repeat('　∟',$num).$value['name'];
                   }
           }
           $num--;
       }
       return $tree;
    }

    /**
     * 分类信息
     * @param $id
     * @return mixed
     */
    public function categoryInfo($id){
        return $this->where('id',$id)->first();
    }

    /**
     * 添加分类
     * @param $request
     * @return mixed
     */
    public function add($request){
        $data['name'] = $request->name;
        $data['sort'] = $request->sort;
        $data['pid'] = $request->pid;
        $data['thumb'] = $request->thumb;
        $data['color'] = $request->color;
        return $this->insert($data);
    }

    /**
     * 修改分类
     * @param $request
     * @return mixed
     */
    public function edit($request){
        $data['name'] = $request->name;
        $data['sort'] = $request->sort;
        $data['pid'] = $request->pid;
        $data['thumb'] = $request->thumb;
        $data['color'] = $request->color;
        return $this->where('id',$request->id)->update($data);
    }

}
