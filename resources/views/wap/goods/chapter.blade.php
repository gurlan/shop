@include('wap.goods.head')


<div id="wrapper">
    <div id="middle" class="container">
        <section class="banner" style='background-image: url({{$goods->thumb}})'>
            <span class="crumbs">
		分类
	</span>
            <h2>{{$goods->goods_name}}</h2>
        </section>

        <menu class='learn-menu'>
            <a  href="{{route('wap.goods.index',['id'=>$goods->id])}}">介绍</a>

            <a class="cur" href="#">章节</a>

            <a>问答</a>
            <a>笔记</a>
        </menu>


        <div class="chapterlist">
                @foreach($chapter as $v)
            <dl class="">
                <dt>{{$v['title']}}</dt>
                    @foreach($v['child'] as $r)
                <dd class=''>
                    <a href="javascript:">
                        <i class='imwap-play_arrow'></i>
                        <div>{{$r['title']}}</div>
                        <span class='imwap-panorama-fisheye'></span>
                    </a>

                </dd>
                    @endforeach


            </dl>

            @endforeach

        </div>


        <a href="{{route('wap.goods.buy',['id'=>$goods->id])}} " class='footer-link'>

            开始学习

        </a>


    </div>
</div>
@include('wap.public.foot')




