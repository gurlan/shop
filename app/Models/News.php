<?php

namespace App\Models;



/**
 * App\banner
 *

 */
class News extends BaseModel
{

    protected $table = 'news';
    public $timestamps = false; //不维护时间戳
    static $position = ['公告'];

    /**列表
     * @param array $where
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($where = array()){
      return  $this->where($where)->orderByDesc('sort')->paginate(10);
    }

    /**
     * 删除
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function del($id){
        return  $this->where('id',$id)->delete();
    }



}
