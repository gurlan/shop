<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
     * 添加分类视图
     * @param CategoryService $categoryService
     * @return $this
     */
    public function add(CategoryService $categoryService){
        $list = $categoryService->getList(0);
        return view('console.category.add')->with('list',$list);
    }

    /**
     * 执行添加
     * @param Request $request
     * @param CategoryService $categoryService
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doAdd(Request $request, CategoryService $categoryService){
        $validator  = Validator::make($request->all(), [
            'name' => 'required',
        ],[
            'name.required'  => '分类名称必填',
        ]);


        if ($validator->fails()) {
            return redirect(route('admin.category.add'))->withErrors($validator)->withInput();
        }

        $categoryService->add($request);
        return redirect(route('admin.category.index'));

    }

    /**
     * 编辑分类视图
     * @param Request $request
     * @param CategoryService $categoryService
     * @return $this
     */
    public function edit(Request $request, CategoryService $categoryService){
        $category = $categoryService->categoryInfo($request->input('id'));
        $list = $categoryService->getList(0);
        return view('console.category.edit')->with('category',$category)->with('list',$list);
    }

    /**
     * 修改分类
     * @param Request $request
     * @param CategoryService $categoryService
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doEdit(Request $request, CategoryService $categoryService){
        $validator  = Validator::make($request->all(), [
            'name' => 'required',
        ],[
            'name.required'  => '分类名称必填',
        ]);
        if ($validator->fails()) {
            return redirect(route('admin.category.edit'))->withErrors($validator)->withInput();
        }
        $categoryService->edit($request);
        return redirect(route('admin.category.index'));
    }
}
