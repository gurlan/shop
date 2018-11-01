@include('wap.goods.head')


<div id="wrapper">
    <div id="middle" class="container">


        <section class="banner" style='background-image: url({{$goods->thumb}})'>
  <span class="crumbs">
{{--	{{$goods->goods_name}}--}}
      分类
	</span>
            <h2>{{$goods->goods_name}}</h2>
        </section>

        <menu class='learn-menu'>
            <a class="cur" href="#">介绍</a>

            <a href="{{route('wap.goods.chapter',['id'=>$goods->id])}}">章节</a>

            <a>问答</a>
            <a>笔记</a>
        </menu>


        <div class="teacher-intro-t">
            <p>{{$goods->introuce}}</p>

            <menu class="">
                <span>难度：{{\App\Http\Controllers\admin\GoodsController::$level[$goods->difficulty]}}</span>

                <span>人数：{{$goods->views}}</span>

                <span>价格：￥{{$goods->goods_price}}</span>
            </menu>
        </div>

        <div class="teacher-intro-b">


            <h4>课程须知</h4>
            <div>{!! html_entity_decode($goods->notice) !!}</div>


            <h4>老师告诉你能学到什么？</h4>
            <div class="pic-wrap">
                {!! html_entity_decode($goods->content) !!}
            </div>


        </div>


        <a href="{{route('wap.goods.buy',['id'=>$goods->id])}} " class='footer-link'>

            开始学习

        </a>


    </div>
</div>

<style>
    .pic-wrap img {
        width: 100%;
        display: block;
    }
</style>
@include('wap.public.foot')