@extends('console.base');
@section('content')
<div id="page-wrapper">
    <div class="graphs">
        <div class="xs">
            <h3>Forms</h3>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <form class="form-horizontal"  method="post" action="{{route('admin.category.doEdit')}}">
                        @csrf
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">分类名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" id="focusedinput" placeholder="分类名" readonly value="{{$data->username}}">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control1" id="inputPassword" name="password">
                            </div>
                            <div class="col-sm-2">
                                <p class="help-block">  {{$errors->first('password')}}</p>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-success btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>

    </div>
</div>
    @endsection