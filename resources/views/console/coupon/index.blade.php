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
                        <th>名称</th>
                        <th>满多少可用</th>
                        <th>优惠金额</th>
                        <th>有效期</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->name}}</td>
                        <td>{{$v->require}}</td>
                        <td>{{$v->cheap}}</td>
                        <td>{{$v->days}}</td>
                        <td><a href="{{route('admin.coupon.del',array('id'=>$v->id))}}">删除</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection