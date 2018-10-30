@extends('console.base');
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="xs">
                <h3>Forms</h3>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" method="post" action="{{route('admin.banner.doAdd')}}"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="selector1" class="col-sm-2 control-label">位置</label>
                                <div class="col-sm-8">
                                    <select name="position" id="selector1" class="form-control1">
                                        @foreach($position as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">排序</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="sort"
                                           value="{{old('sort')?old('sort'):0}}">
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="exampleInputFile" class="col-sm-2 control-label">图片</label>
                                <div class="col-sm-8">

                                    <input type="file" id="exampleInputFile" name="image">
                                </div>
                                <div class="col-sm-2">

                                    <p class="help-block">{{$error}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">链接</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="url"
                                           value="{{old('url')}}">
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
    <link href="{{asset('/editor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="{{asset('/editor/umeditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src=" {{asset('/editor/umeditor.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/editor/lang/zh-cn/zh-cn.js')}}"></script>

    <script type="text/javascript">
        UM.getEditor('description', {initialFrameWidth: null}).setHeight(200);
        UM.getEditor('introduce', {initialFrameWidth: null}).setHeight(200);
        UM.getEditor('notice', {initialFrameWidth: null}).setHeight(200);
        UM.getEditor('content', {initialFrameWidth: null}).setHeight(200);
    </script>

@endsection