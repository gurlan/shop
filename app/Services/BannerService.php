<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Banner;
use Illuminate\Support\Facades\Redis;
use Predis\Client;


class BannerService
{
    protected  $banner;

    public function __construct(Banner $banner,Client $client)
    {
        $this->banner = $banner;
        $this->redis = $client;
    }


    /**
     * 列表
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($where = array()){
        if($this->redis->exists('banner')){
            $banner = $this->redis->get('banner');
            return json_decode($banner,true);
        }
        $banner =  $this->banner->getList($where);
        $this->redis->set('bannerList',json_encode($banner));
        return $banner;
    }

    /**
     * 删除
     * @param $banner_id
     * @return bool|null
     */
    public function del($banner_id){
        return $this->banner->del($banner_id);
    }


    public function add($request){
        $data['image'] = $request->image;
        $data['url'] = $request->url;
        $data['sort'] = intval($request->sort);
        $data['position'] = $request->position;
      return  $this->banner->insert($data);
    }


}