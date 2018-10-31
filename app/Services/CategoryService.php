<?php

/**
 * Created by PhpStorm.
 * User: zwyl
 * Date: 2018/10/26
 * Time: 12:18
 */

namespace App\Services;
use App\Models\Category;


class CategoryService
{
    protected  $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * 取得分类列表
     * @param $pid
     * @return mixed
     */
    public function getList($pid){
       return $this->category->getList($pid);
    }

    /**
     * 分类信息
     * @param $id
     * @return mixed
     */
    public function categoryInfo($id){
       return $this->category->categoryInfo($id);
   }

    /**
     * 添加
     * @param $request
     * @return mixed
     */
    public function add($request){
        return $this->category->add($request);
    }

    /**修改分类
     * @param $request
     * @return mixed
     */
    public function edit($request){
        return $this->category->edit($request);
    }



}