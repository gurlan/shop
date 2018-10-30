@extends('console.base');
@section('content')
<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <div class="xs">
            <h3>Basic Tables</h3>
            <div class="panel-body1">
                <a class="btn btn_5 btn-lg btn-primary" href="{{route('admin.category.add')}}">添加</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                  @foreach ($category as $v )
                    <tr>
                        <th scope="row">{{$v['id']}}</th>
                        <td>{{$v['name']}}</td>
                        <td>{{$v['sort']}}</td>
                        <td><a href="{{route('admin.admin.edit',array('id'=>$v->id))}}">编辑</a></td>
                    </tr>
                      @if($v['child'])
                          @foreach ($v['child'] as $v )
                              <tr>
                                  <th scope="row" >{{$v['id']}}</th>
                                  <td>{{$v['name']}}</td>
                                  <td>{{$v['sort']}}</td>
                                  <td><a href="{{route('admin.category.edit',array('id'=>$v['id']))}}">编辑</a></td>
                              </tr>
                          @endforeach
                          @endif
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>

    </div>
</div>
    @endsection