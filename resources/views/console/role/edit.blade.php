@extends('console.base');
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="xs">
                <h3>Forms</h3>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal"  method="post" action="{{route('admin.role.edit')}}">
                            @csrf
                            <input type="hidden" value="{{$role->id}}" name="role_id">
                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">角色名</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" name="name" id="focusedinput" value="{{$role->name}}" placeholder="角色名"  >
                                </div>
                                <div class="col-sm-2">
                                    <p class="help-block">  {{$errors->first('name')}}</p>
                                </div>

                            </div>
                            @foreach($permissions as $v)
                                <div class="form-group">
                                    <label for="checkbox" class="col-sm-2 control-label">{{$v['description']}}</label>
                                    <div class="col-sm-8">
                                        @foreach($v['child'] as $r)
                                            <div class="checkbox-inline1"><label><input type="checkbox"  value="{{$r[id]}}" name="permission_id[]" @if(in_array($r['id'],$has)) checked @endif> {{$r['description']}}</label></div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
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