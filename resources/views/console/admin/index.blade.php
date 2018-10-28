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
                        <th>最后登录</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admins as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->username}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->last_login)}}</td>
                        <td><a href="{{route('admin.admin.edit',array('id'=>$v->id))}}">编辑</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection