<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Permission;
use App\Models\Model\Role;
use App\Models\Model\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class RoleController extends Controller
{
    //获取授权页面
public function auth($id)
{
    //获取当前的角色
$role = Role::find($id);
    //获取所有的权限列表
    $perms = Permission::get();
    //获取当前的角色拥有的权限
$own_perms = $role->permission;
//dd($own_perms);
    //角色拥有的权限的id
    $own_pers = [];
foreach ($own_perms as $v){
    $own_pers[] = $v->id;
}
    return view('admin.role.auth',compact('role','perms','own_pers'));
//    return view('admin.user.auth',compact('role','perms','own_pers'));
}
//处理授权的方法
public function doAuth(Request $request)
{
    $input = $request->except('_token');
//    dd($input);

    //删除当前角色已有的权限
    \DB::table('role_permission')->where('role_id',$input['role_id'])->delete();
    //添加新授予的权限
    if(!empty($input['permission_id'])) {
        foreach ($input['permission_id'] as $v) {
            \DB::table('role_permission')->insert(['role_id' => $input['role_id'], 'permission_id' => $v]);
        }
    }

    return redirect('admin/role');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1.获取所有的角色数据
        $role = Role::get();

        //2.返回角色视图
        return view('admin.role.list',compact('role'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取表单提交的数据
        $input = $request->except('token');
//        dd($input);
        //2.进行表单验证

//3.将数据库添加到role表中
    $res = Role::create($input);
    if($res) {
        return redirect('admin/role');
    }else{
            return back()->with('msg','添加失败');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
//        使用模型修改表记录的两种方法,方法一
        $role = Role::find($id);
        $role->role_name = $input['role_name'];
        $res = $role->save();

        if($res){
//            return 1111;
            $data = [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
//            return 2222;
            $data = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $role = Role::find($id);
        $res = $role->delete();
        if ($res){
            $data =[
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data =[
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
//json_encode($data)
        return $data;
    }

    public function delAll(Request $request)
    {
        $input = $request->input('ids');
//dd($input);
        $res = Role::destroy($input);
        if ($res){
            $data =[
                'status'=>0,
                'message'=>'删除成功了'
            ];
        }else{
            $data =[
                'status'=>1,
                'message'=>'删除失败了'
            ];
        }
//json_encode($data)
        return $data;
    }



}
