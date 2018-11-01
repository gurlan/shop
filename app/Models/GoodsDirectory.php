<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Redis;
use Predis\Client;

/**
 * App\Models\GoodsDirectory
 *
 * @mixin \Eloquent
 */
class GoodsDirectory extends Model
{

    protected $table = 'goods_directory';

    public $timestamps = false;

    public $redis = '';


    /**
     * 采集数据入库
     * @param $goods_id
     * @param $directory
     */
    public function add($goods_id, $directory)
    {
        $this->where('goods_id', $goods_id)->delete();
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

    /**
     * 获取商品目录
     * @param $goods_id
     * @return array|mixed
     */
    public function getDirectory($goods_id)
    {

        if (Redis::get('directory:' . $goods_id)) {

            return json_decode(Redis::get('directory:' . $goods_id), true);
        }

        $directory = $this->where('goods_id', $goods_id)->where('pid', 0)->get()->toArray();

        if ($directory) {
            foreach ($directory as $k => $v) {
                $directory[$k]['child'] = $this->where('pid', $v['id'])->get()->toArray();
            }
        }

        Redis::set('directory:' . $goods_id, json_encode($directory));

        return $directory;

    }
}
