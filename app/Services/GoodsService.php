<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Category;
use App\Models\Goods;
use App\Models\GoodsDirectory;
use Illuminate\Support\Facades\Log;
use JsonSchema\Uri\Retrievers\Curl;
use QL\QueryList;


class GoodsService
{
    protected  $category;
    protected  $goods;
    protected  $queryList;
    protected  $directory;
    public function __construct(Category $category,Goods $goods,QueryList $queryList,GoodsDirectory $goodsDirectory)
    {
        $this->category = $category;
        $this->goods = $goods;
        $this->queryList = $queryList;
        $this->directory = $goodsDirectory;
    }

    /**
     * 取得商品列表
     * @param $pid
     * @return mixed
     */
    public function getList($where=array()){

       return $this->goods->getList($where);
    }


    /**
     * 添加商品
     * @param $request
     * @return mixed
     */
    public function add($request){

        return $this->goods->add($request);
    }

    /**
     * 删除
     * @param $goods_id
     */
    public function del($goods_id){
        return $this->goods->del($goods_id);
    }

    /**
     * 商品信息
     * @param $goods_id
     * @return mixed
     */
    public function goodsInfo($goods_id){
        return $this->goods->goodsInfo($goods_id);
    }


    /**
     * 修改
     * @param $request
     * @return mixed
     */
    public function edit($request){
        return $this->goods->edit($request);
    }

    /**
     * 采集
     * @param $goods_id
     */
    public function collect($goods_id){
        $copyfrom = $this->goodsInfo($goods_id)->copyfrom;
        if (!$copyfrom){
            Log::debug('copyfrom字段为空');
            $res['code'] = 200;
            $res['msg'] = 'copyfrom字段为空';
            return $res;
        }
         $cid = $this->findNum($copyfrom);
         $url = 'https://coding.m.imooc.com/api/classindex/stepList.html?cid='.$cid;//目录接口
         $data = json_decode(file_get_contents($url),true);
         $directory = $data['data']; //目录



        $ql =$this->queryList->bind('downloadImage',function ($path){
            $data = $this->getData()->map(function ($item) use($path){
                //获取图片
                $img = file_get_contents($item['image']);

                $localPath = $path.'/'.md5($img).'.jpg';
                //保存图片到本地路径
                file_put_contents($localPath,$img) ;
                //data数组中新增一个自定义的本地路径字段
                $item['local_path'] = $localPath;
                return $item;
            });
            //更新data属性
            $this->setData($data);
            return $this;
        });
        $path = 'upload/content'.'/'.date('Y-m-d',time());
        $this->mkdirs($path);
        $data = $ql->get($copyfrom)->rules([
            'image' => ['.pic-wrap img','src']
        ])->query()->downloadImage($path)->getData();

         if ($directory && $data){
            $this->directory->add($goods_id,$directory);
             $this->goods->content($goods_id,$data);
            $res['code'] = 200;
            $res['msg'] = 'success';
             return $res;
         }
        $res['code'] = 200;
        $res['msg'] = 'false';
        return $res;
    }

   private function findNum($str=''){
        $str=trim($str);
        if(empty($str)){return '';}
        $reg='/(\d{3}(\.\d+)?)/is';//匹配数字的正则表达式
        preg_match_all($reg,$str,$result);
        if(is_array($result)&&!empty($result)&&!empty($result[1])&&!empty($result[1][0])){
            return $result[1][0];
        }
        return '';
    }

   protected function mkdirs($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!mkdirs(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    }

}