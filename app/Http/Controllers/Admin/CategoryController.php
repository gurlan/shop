<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    /**分类列表
     * @param Request $request
     * @param CategoryService $categoryService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CategoryService $categoryService){
        $category = $categoryService->getList(0);
        return view('console.category.index')->with('category',$category);
    }

    /**
     * 编辑分类视图
     * @param Request $request
     * @param CategoryService $categoryService
     * @return $this
     */
    public function edit(Request $request, CategoryService $categoryService){
        $category = $categoryService->categoryInfo($request->input('id'));
        return view('console.category.edit')->with('category',$category);
    }
}
