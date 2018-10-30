@extends('console.base');

@section('content')
<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Basic Tables</h3>
            <div class="panel-body1">
                <a class="btn btn_5 btn-lg btn-primary" href="{{route('admin.banner.add')}}">添加</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>图片</th>
                        <th>地址</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td><img src="{{asset('storage/app/'.$v->image)}}" /></td>
                        <td>{{$v->url}}</td>
                        <td><a href="{{route('admin.banner.del',array('id'=>$v->id))}}">删除</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection