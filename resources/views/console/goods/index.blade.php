@extends('console.base');

@section('content')
<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Basic Tables</h3>

            <div class="panel-body1">
                <a class="btn btn_5 btn-lg btn-primary" href="{{route('admin.goods.add')}}">添加</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>价格</th>
                        <th>点击量</th>
                        <th>成交量</th>
                        <th>排序</th>
                        <th>分类</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($goods as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->goods_name}}</td>
                        <td>{{$v->goods_price}}</td>
                        <td>{{$v->views}}
                        <td>{{$v->sales}}</td>
                        <td>{{$v->sort}}</td>
                        <td>{{$v->cat_name}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                        <td><a href="{{route('admin.goods.edit',array('id'=>$v->id))}}">编辑</a></td>
                        <td><a href="{{route('admin.goods.del',array('id'=>$v->id))}}">删除</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection