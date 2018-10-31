<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\News;
use Illuminate\Support\Facades\Redis;
use Predis\Client;


class NewsService
{
    protected  $news;

    public function __construct(News $news,Client $client)
    {
        $this->news = $news;
        $this->redis = $client;
    }


    /**
     * 列表
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($where = array()){
        $banner =  $this->news->getList($where);
        return $banner;
    }

    /**
     * 删除
     * @param $banner_id
     * @return bool|null
     */
    public function del($news_id){
        return $this->news->del($news_id);
    }


    /**
     * 添加
     * @param $request
     * @return bool
     */
    public function add($request){
        $data['thumb'] = $request->thumb;
        $data['content'] = $request->content;
        $data['url'] = $request->url;
        $data['title'] = $request->title;
        $data['sort'] = intval($request->sort);
        $data['position'] =  intval($request->position);
        $data['add_time'] = time();
      return  $this->news->insert($data);
    }


}