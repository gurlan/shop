@extends('console.base');

@section('content')
<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Basic Tables</h3>

            <div class="panel-body1">
                <a class="btn btn_5 btn-lg btn-primary" href="{{route('admin.role.add')}}">添加</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>角色</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->name}}</td>
                        <td>{{$v->created_at}}</td>
                        <td><a href="{{route('admin.role.edit',array('id'=>$v->id))}}">编辑</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection