<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    private $guard_name = 'admin'; //守卫名称

    /**
     * 角色列表
     * @return $this
     */
    public function index()
    {

        $roles = Role::get();

        return view('console.role.index')->with('roles', $roles);
    }


    /**
     * 添加角色
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ], [
                'name.required' => '角色名称必填',
            ]);


            if ($validator->fails()) {
                return redirect(route('admin.role.add'))->withErrors($validator)->withInput();
            }
            $role_id = Role::create(['name' => $request->name, 'guard_name' => $this->guard_name]);
            $permission_id = $request->permission_id;

            foreach ($permission_id as $k => $v) {
                $data[$k]['permission_id'] = $v;
                $data[$k]['role_id'] = $role_id->id;
            }

            DB::table('role_has_permissions')->insert($data);
            return redirect(route('admin.role.index'));
        }
        $permissions = $this->permissionsList(0);

        return view('console.role.add')->with('permissions', $permissions);
    }

    /**
     * 修改角色
     * @param Request $request
     * @return mixed
     */
    public function edit(Request $request)
    {
        if ($request->isMethod('get')) {
            $role = Role::findById($request->id, 'admin');
            $permissions = $this->permissionsList(0);

            #获取这个角色已经有的权限
            $hasPermissions = $role->permissions->toArray();

            $hasId = array();

            foreach ($hasPermissions as $v) {
                $hasId[] = $v['id'];
            }
            return view('console.role.edit')->with('permissions', $permissions)->with('role', $role)->with('has', $hasId);
        }


        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => '角色名称必填',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.role.add'))->withErrors($validator)->withInput();
        }
        DB::transaction(function () use ($request) {
            $role_id = $request->role_id;
            Role::where('id', $role_id)->delete();
            DB::table('role_has_permissions')->where('role_id', $role_id)->delete();
        });
        $role_id = Role::create(['name' => $request->name, 'guard_name' => $this->guard_name]);
        $permission_id = $request->permission_id;
        foreach ($permission_id as $k => $v) {
            $data[$k]['permission_id'] = $v;
            $data[$k]['role_id'] = $role_id->id;
        }
        DB::table('role_has_permissions')->insert($data);
        return redirect(route('admin.role.index'));

    }


    /**
     * 返回权限结果
     * @param $pid
     * @param int $num
     * @return mixed
     */
    public function permissionsList($pid, &$num = 0)
    {
        $tree = Permission::where('pid', $pid)->get()->toArray();
        if ($tree) {
            $num++;
            foreach ($tree as $k => $v) {
                $tree[$k]['child'] = $this->permissionsList($v['id'], $num);
                foreach ($tree[$k]['child'] as $key => $value) {
                    $tree[$k]['child'][$key]['name'] = str_repeat('　', $num) . $value['name'];
                }
            }
            $num--;
        }
        return $tree;
    }

}
