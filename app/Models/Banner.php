<?php

namespace App\Models;



/**
 * App\banner
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $image
 * @property string|null $url
 * @property int $sort
 * @property int $position
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Banner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Banner whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Banner whereUrl($value)
 */
class Banner extends BaseModel
{

    protected $table = 'banner';
    public $timestamps = false; //不维护时间戳
    static $position = ['首页'];

    /**列表
     * @param array $where
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($where = array()){
      return  $this->where($where)->paginate(10);
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
