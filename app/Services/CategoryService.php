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



}