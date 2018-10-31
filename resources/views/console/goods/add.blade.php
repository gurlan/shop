@extends('console.base')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="xs">
                <h3>Forms</h3>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" method="post" action="{{route('admin.goods.doAdd')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">商品名称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" placeholder="商品名称"
                                           name="goods_name" value="{{old('goods_name')}}">
                                </div>
                                <div class="col-sm-2">
                                    <p class="help-block">  {{$errors->first('goods_name')}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="selector1" class="col-sm-2 control-label">分类</label>
                                <div class="col-sm-8">
                                    <select name="cat_id" id="selector1" class="form-control1">
                                        @foreach($category as $v)
                                            <option value="{{$v['id']}}" disabled>{{$v['name']}}</option>
                                            @if($v['child'])
                                                @foreach ($v['child'] as $v )
                                                    <option value="{{$v['id']}}">{{$v['name']}}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="selector1" class="col-sm-2 control-label">难度</label>
                                <div class="col-sm-8">
                                    <select name="difficulty" id="selector1" class="form-control1">
                                        @foreach($level as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">排序</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="sort" value="{{old('sort')?old('sort'):0}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">价格</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" placeholder="0.00"
                                           name="goods_price" value="{{old('goods_price')}}">
                                </div>
                                <div class="col-sm-2">
                                    <p class="help-block">  {{$errors->first('goods_price')}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-sm-2 control-label">封面</label>
                                <div class="col-sm-8">
                                    <input type="file" id="exampleInputFile" name="thumb">
                                </div>
                                <div class="col-sm-2">
                                    <p class="help-block">{{$errors->first('thumb')}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">来源</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" id="focusedinput" name="copyfrom" value="{{old('copyfrom')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">描述</label>
                                <div class="col-sm-8">
                                <script  type="text/javascript" id="description" name="description">{!!old(description)!!}</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">简介</label>
                                <div class="col-sm-8">
                                <script  type="text/javascript" id="introduce" name="introduce">{!!old(introduce)!!}</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">须知</label>
                                <div class="col-sm-8">
                                <script  type="text/javascript" id="notice" name="notice">{!!old(notice)!!}</script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">详情</label>
                                <div class="col-sm-8">
                                <script  type="text/javascript" id="content" name="content">{!!old(content)!!}</script>
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