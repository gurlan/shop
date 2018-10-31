<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * App\Models\GoodsDirectory
 *
 * @mixin \Eloquent
 */
class GoodsDirectory extends Model
{

    protected $table = 'goods_directory';

    public $timestamps = false;

    /**
     * 采集数据入库
     * @param $goods_id
     * @param $directory
     */
    public function add($goods_id, $directory)
    {
        $this->where('goods_id',$goods_id)->delete();
        foreach ($directory as $k => $v) {
            $data['title'] = $v['name'];
            $data['goods_id'] = $goods_id;
            $data['pid'] = 0;
            $pid = $this->insertGetId($data);
            if ($pid) {
                foreach ($v['media'] as $l => $r) {
                    $child[$l]['title'] = $r['name'];
                    $child[$l]['goods_id'] = $goods_id;
                    $child[$l]['pid'] = $pid;
                }
                $this->insert($child);
            }
        }
        return true;
    }
}
