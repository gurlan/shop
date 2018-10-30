@extends('console.base');
@section('content')
<div id="page-wrapper">
    <div class="graphs">
        <div class="xs">
            <h3>Forms</h3>
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <form class="form-horizontal"  method="post" action="{{route('admin.category.doAdd')}}">
                        @csrf

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">分类名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" id="focusedinput" placeholder="分类名" name="name" >
                            </div>
                            <div class="col-sm-2">
                                <p class="help-block">  {{$errors->first('name')}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">上级分类</label>
                            <div class="col-sm-8">
                                <select  id="selector1" class="form-control1" name="pid">
                                    @foreach($list as $v)
                                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" id="focusedinput" placeholder="排序" name="sort" >
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