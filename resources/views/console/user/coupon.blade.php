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
                        <th>状态</th>
                        <th>订单</th>
                        <th>过期时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $v )
                    <tr>
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->name}}</td>
                        <td>{{\App\Models\UserCoupon::$status[$v->status]}}</td>
                        <td>{{$v->order}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->out_time)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection