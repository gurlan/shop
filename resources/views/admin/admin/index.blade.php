@extends('base')
@section('content')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header">
                        <h1 class="page-header">
                            管理员列表
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">首页</a></li>
					  <li><a href="#">Tables</a></li>
					  <li class="active">Data</li>
					</ol>

		</div>

            <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             Advanced Tables
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>用户名</th>
                                            <th>登录时间</th>
                                            <th>操作</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($admins as $v )
                                        <tr class="odd gradeX">
                                            <td>{{$v->id}}</td>
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
                    <!--End Advanced Tables -->
                </div>
            </div>
    </div>
 </div>
@endsection