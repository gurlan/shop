@extends('console.base')

@section('content')
<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Basic Tables</h3>
            <div class="panel-body1">
                <a class="btn btn_5 btn-lg btn-primary" href="{{route('admin.news.add')}}">添加</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>图片</th>
                        <th>地址</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <th >{{$v->title}}</th>
                        <td>@if($v->thumb)<img src="{{asset($v->thumb)}}" style="width: 100px;height: 100px" />@endif</td>
                        <td>{{$v->url}}</td>
                        <td>{{date('Y-m-d',$v->add_time)}}</td>
                        <td><a href="{{route('admin.news.del',array('id'=>$v->id))}}">删除</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection