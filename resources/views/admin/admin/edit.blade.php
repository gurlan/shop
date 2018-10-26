@extends('base')
@section('content')
        <!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Form Inputs Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Data</li>
        </ol>

    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-action">
                      用户信息
                    </div>
                    <div class="card-content">


                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                   <p>用户名：{{$data->username}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <p>最后登录：{{date('Y-m-d H:i:s',$data->last_login)}}</p>
                                </div>
                            </div>
                        </form>

                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>

            <!-- /.panel-body -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
@endsection
