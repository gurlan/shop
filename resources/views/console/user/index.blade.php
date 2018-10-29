@extends('console.base');

@section('content')
<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Basic Tables</h3>

            <div class="panel-body1">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>手机号</th>
                        <th>邮箱</th>
                        <th>最后登录</th>
                        <th>注册时间</th>
                        <th>登录次数</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->username}}</td>
                        <td>{{$v->mobile}}</td>
                        <td>{{$v->email}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->last_login)}}</td>
                        <td>{{$v->login_num}}</td>
                        <td><a href="{{route('admin.user.edit',array('id'=>$v->id))}}">编辑</a> <a href="{{route('admin.user.del',array('id'=>$v->id))}}">删除</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection