@include('wap.public.head')


<div id="wrapper">
    <div id="middle" class="container">


        <section class="header-menu">
            <ul class="clearfix">
                <li class="cur"><a href="index.htm">首页</a></li>
                <li><a href="course/list.htm">课程</a></li>
                <li>
                    <a href="javascript:if(confirm('https://class.m.imooc.com/  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://class.m.imooc.com/'"
                    >路径</a></li>
                <li>
                    <a href="javascript:if(confirm('https://coding.m.imooc.com/  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://coding.m.imooc.com/'"
                    >实战</a></li>
                <li><a href="article.htm">手记</a></li>
                <li><a href="wenda/index.htm">猿问</a></li>
            </ul>
        </section>

        <section class="header-menu fixed">
            <ul class="clearfix">
                <li class="cur"><a href="index.htm">首页</a></li>
                <li><a href="course/list.htm">课程</a></li>
                <li>
                    <a href="javascript:if(confirm('https://class.m.imooc.com/  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://class.m.imooc.com/'"
                    >路径</a></li>
                <li>
                    <a href="javascript:if(confirm('https://coding.m.imooc.com/  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://coding.m.imooc.com/'"
                    >实战</a></li>
                <li><a href="article.htm">手记</a></li>
                <li><a href="wenda/index.htm">猿问</a></li>
            </ul>
        </section>


        <div id="pages-container">
            <!-- banner 轮播 -->
            <section class="banner">
                <div class="swiper-container swiper-container-banner">
                    <div class="swiper-wrapper">

                        @foreach($banner as $v)
                            <div class="swiper-slide">
                                <a href="{{$v->url}}">
                                    <img src="{{asset($v->image)}}">
                                </a>
                            </div>

                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <div class="notice clearfix">
                <p class="l"><i class="imwap-volume_up"></i>公告：{{$notice['0']->title}}</p>
                <a href="{{$notice['0']->url}}" class="r btn-detail">详情</a>
            </div>


            <section class="mode ccc">
                <p class="tit">
                    <span class="icon icon-0"></span>实战推荐
                    <i class="imwap-arrow_r r"></i>
                    <a href="" class="r more">更多实战</a>
                </p>


                <div class="imooc-list js-imooc-list clearfix">
                    <!-- 免费 1 实战 2  路径 4 -->
                    <div class="big-box clearfix">

                        @foreach($recommend as $v)
                            @if($loop->iteration<=2)
                                <div class="big-card l cd"
                                     style="box-shadow: 0 4px 16px 0 {{$v->color}};background: {{$v->color}} url({{asset($v->cat_img)}}) no-repeat right;"

                                >
                                    <a href="javascript:">
                                        <h2>{{$v->cat_name}}</h2>
                                        <p class="big-card-title">{{$v->goods_name}}</p>
                                        <div class="big-card-bottom">
                                            ¥{{$v->goods_price}}
                                            <span class="number"><i class="imwap-peaple"></i>{{$v->views}}</span>

                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="small-box nosw">
                        @foreach($recommend as $v)
                            @if($loop->iteration>2)
                        <div class="small-card clearfix">
                            <a href="javascript: ">
                                <img data-original="{{asset($v->thumb)}}" class="small-card-banner l lazy">
                                <div class="l">
                                    <p class="small-card-title">{{$v->goods_name}}</p>
                                    <div class="small-card-info">

                                        {{\App\Http\Controllers\admin\GoodsController::$level[$v->difficulty]}} · {{$v->views}}人在学

                                    </div>

                                    <div class="small-card-price ">

                                        ¥{{$v->goods_price}}

                                    </div>

                                </div>
                            </a>
                        </div>
                            @endif
                        @endforeach
                    </div>

                </div>

            </section>


            <section class="mode fff">
                <p class="tit">
                    <span class="icon icon-1"></span>新上好课

                    <a href="" class="r more"></a>
                </p>


                <div class="imooc-list js-imooc-list clearfix">
                    <!-- 免费 1 实战 2  路径 4 -->
                    <div class="big-box clearfix">

                        @foreach($new as $v)
                            @if($loop->iteration<=2)
                        <div class="big-card l cd" style="box-shadow: 0 4px 16px 0 {{$v->color}};background: {{$v->color}} url({{$v->cat_image}}) no-repeat right;">
                            <a href="javascript:">
                                <h2>{{$v->cat_name}}</h2>
                                <p class="big-card-title">{{$v->goods_name}}</p>
                                <div class="big-card-bottom">
                                    ¥{{$v->goods_price}}
                                    <span class="number"><i class="imwap-peaple"></i>{{$v->views}}</span>
                                </div>
                            </a>
                        </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="small-box">
                        <div class="swiper-container swiper-container-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    @foreach($new as $v)
                                        @if($loop->iteration>2)
                                    <div class="small-card clearfix">
                                        <a href="javascript: ">
                                            <img data-original="{{asset($v->thumb)}}"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">{{$v->title}}</p>
                                                <div class="small-card-info">

                                                    {{\App\Http\Controllers\admin\GoodsController::$level[$v->difficulty]}} · {{$v->views}}人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥{{$v->goods_price}}

                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="swiper-slide">
                                    @foreach($new as $v)
                                        @if($loop->iteration>5)
                                            <div class="small-card clearfix">
                                                <a href="javascript: ">
                                                    <img data-original="{{asset($v->thumb)}}"
                                                         class="small-card-banner l lazy">
                                                    <div class="l">
                                                        <p class="small-card-title">{{$v->title}}</p>
                                                        <div class="small-card-info">

                                                            {{\App\Http\Controllers\admin\GoodsController::$level[$v->difficulty]}} · {{$v->views}}人在学

                                                        </div>

                                                        <div class="small-card-price ">

                                                            ¥{{$v->goods_price}}

                                                        </div>

                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>


                </div>

            </section>


            <section class="mode ccc">
                <p class="tit">
                    <span class="icon icon-3"></span>新手入门
                    <i class="imwap-arrow_r r"></i>
                    <a href="javascript:if(confirm('http://www.imooc.com/topic/xiaochengxu?mc_marking=e417a314a03d64868f37b74caf976b1c&mc_channel=syzt1  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/topic/xiaochengxu?mc_marking=e417a314a03d64868f37b74caf976b1c&mc_channel=syzt1'"

                       class="r more"><span class="original">专题</span>火爆微信小程序开发，只有实用，没有套路！</a>
                </p>


                <div class="imooc-list js-imooc-list clearfix">
                    <!-- 免费 1 实战 2  路径 4 -->
                    <div class="big-box clearfix">


                        <div class="big-card l cl"
                             style="background: #fff url(//www.imooc.com/static/img/andriod/zhiye/web.png) no-repeat right;">
                            <a href="javascript:if(confirm('http://class.imooc.com/sc/20  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://class.imooc.com/sc/20'"
                            >
                                <h2>Web前端攻城狮</h2>
                                <p class="big-card-title" style="color: #FF7900;">前端零基础入门</p>
                                <div class="big-card-bottom">

                                    ¥568.00


                                    <span class="step">5步／33课</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cl"
                             style="background: #fff url(//www.imooc.com/static/img/andriod/zhiye/java.png) no-repeat right;">
                            <a href="javascript:if(confirm('http://class.imooc.com/sc/18  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://class.imooc.com/sc/18'"
                            >
                                <h2>Java攻城狮</h2>
                                <p class="big-card-title" style="color: #FF006E;">Java零基础入门</p>
                                <div class="big-card-bottom">

                                    ¥358.00


                                    <span class="step">3步／27课</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cl"
                             style="background: #fff url(//www.imooc.com/static/img/andriod/zhiye/android.png) no-repeat right;">
                            <a href="javascript:if(confirm('http://class.imooc.com/sc/6  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://class.imooc.com/sc/6'"
                            >
                                <h2>Android攻城狮</h2>
                                <p class="big-card-title" style="color: #00B43C;">Android零基础入门</p>
                                <div class="big-card-bottom">

                                    ¥499.00


                                    <span class="step">5步／43课</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #ff4545;background: #ff4545 url(//img3.mukewang.com/5b1746ca000157da02400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('https://www.imooc.com/learn/1059  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1059'"
                            >
                                <h2>Java</h2>
                                <p class="big-card-title">Springboot 微信小程序 – 微信登录功能实战</p>
                                <div class="big-card-bottom">

                                    免费


                                    <span class="number"><i class="imwap-peaple"></i>2092</span>

                                </div>
                            </a>
                        </div>


                    </div>

                    <div class="small-box">
                        <div class="swiper-container swiper-container-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=75  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=75'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/583e42fb0001e04f05400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">微信小程序入门与实战 常用组件API开发技巧项目实战</p>
                                                <div class="small-card-info">


                                                    初级 · 15066人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥149.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://class.imooc.com/sc/43  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://class.imooc.com/sc/43'"
                                        >
                                            <img data-original="//climg.mukewang.com/5acd69bb000103d706000338.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">SSM主流框架入门与综合项目实战</p>
                                                <div class="small-card-info">


                                                    4步骤 · 17门课 · 1110人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥628.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1062  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1062'"
                                        >
                                            <img data-original="//img3.mukewang.com/5bc552390001884602400135-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">移动界面设计</p>
                                                <div class="small-card-info">


                                                    初级 · 1874人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                </div>
                                <div class="swiper-slide">


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://class.imooc.com/sc/30  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://class.imooc.com/sc/30'"
                                        >
                                            <img data-original="//climg.mukewang.com/5993e8880001521206000338.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">PHP小白零基础入门</p>
                                                <div class="small-card-info">


                                                    5步骤 · 26门课 · 345人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥628.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1047  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1047'"
                                        >
                                            <img data-original="//img3.mukewang.com/5bbabc240001d88e05400300-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">Flink入门</p>
                                                <div class="small-card-info">


                                                    入门 · 1374人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=71  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=71'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/59eeb022000162bc05400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">学习算法思想，修炼编程内功</p>
                                                <div class="small-card-info">


                                                    中级 · 6799人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥166.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>

            </section>


            <section class="commend-ad mode ccc">
                <a href="act/share.htm"><img
                            src="../img1.mukewang.com/5bb084f700016fab10000250.jpg"
                            title="砍价活动"></a>
            </section>


            <section class="mode fff">
                <p class="tit">
                    <span class="icon icon-4"></span>技能提升
                    <i class="imwap-arrow_r r"></i>
                    <a href="javascript:if(confirm('http://www.imooc.com/topic/springboot?mc_marking=bd4bfd636a6f7a1c2863bf9c48e62fe4&mc_channel=syzt3  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/topic/springboot?mc_marking=bd4bfd636a6f7a1c2863bf9c48e62fe4&mc_channel=syzt3'"

                       class="r more"><span class="original">专题</span>打开Spring Boot学习的最佳方式</a>
                </p>


                <div class="imooc-list js-imooc-list clearfix">
                    <!-- 免费 1 实战 2  路径 4 -->
                    <div class="big-box clearfix">


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #ff4545;background: #ff4545 url(//img.mukewang.com/5b1746ca000157da02400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=262  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=262'"
                            >
                                <h2>Java</h2>
                                <p class="big-card-title">RabbitMQ消息中间件技术精讲</p>
                                <div class="big-card-bottom">

                                    ¥348.00


                                    <span class="number"><i class="imwap-peaple"></i>328</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #eb3030;background: #eb3030 url(//img3.mukewang.com/5b1893f90001d25702400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=251  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=251'"
                            >
                                <h2>JavaScript</h2>
                                <p class="big-card-title">纯正商业级应用-微信小程序开发实战</p>
                                <div class="big-card-bottom">

                                    ¥366.00


                                    <span class="number"><i class="imwap-peaple"></i>1049</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #3093ff;background: #3093ff url(//img3.mukewang.com/5b1747f90001deea02400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('https://www.imooc.com/learn/1027  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1027'"
                            >
                                <h2>iOS</h2>
                                <p class="big-card-title">iOS手机深度学习</p>
                                <div class="big-card-bottom">

                                    免费


                                    <span class="number"><i class="imwap-peaple"></i>2927</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #ff4545;background: #ff4545 url(//img1.mukewang.com/5b1746ca000157da02400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=187  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=187'"
                            >
                                <h2>Java</h2>
                                <p class="big-card-title">Spring Cloud微服务实战</p>
                                <div class="big-card-bottom">

                                    ¥366.00


                                    <span class="number"><i class="imwap-peaple"></i>2178</span>

                                </div>
                            </a>
                        </div>


                    </div>

                    <div class="small-box">
                        <div class="swiper-container swiper-container-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=189  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=189'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/5a9614850001bc3405400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">系统学习Docker 践行DevOps理念</p>
                                                <div class="small-card-info">


                                                    中级 · 907人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥299.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/845  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/845'"
                                        >
                                            <img data-original="//img2.mukewang.com/5934bac20001a5c906000338-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">SVN从入门到放弃</p>
                                                <div class="small-card-info">


                                                    高级 · 17361人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=169  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=169'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/5a39cd3f0001c09805400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">Python3入门机器学习 经典算法与应用</p>
                                                <div class="small-card-info">


                                                    中级 · 1681人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥399.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                </div>
                                <div class="swiper-slide">


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/785  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/785'"
                                        >
                                            <img data-original="//img4.mukewang.com/586395f4000145e006000338-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">微服务架构在二手交易平台（转转）中的实践</p>
                                                <div class="small-card-info">


                                                    高级 · 21522人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=101  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=101'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/5909a1250001197e05400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">BAT大牛亲授技能+技巧 Android面试快速充电升级</p>
                                                <div class="small-card-info">


                                                    中级 · 3278人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥288.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1043  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1043'"
                                        >
                                            <img data-original="//img3.mukewang.com/5b8ce427000121b406000338-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">Kafka流处理平台</p>
                                                <div class="small-card-info">


                                                    中级 · 7277人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>

            </section>


            <section class="mode ccc">
                <p class="tit">
                    <span class="icon icon-5"></span>前沿技术
                    <i class="imwap-arrow_r r"></i>
                    <a href="javascript:if(confirm('http://www.imooc.com/topic/webframe?mc_marking=88f94da97eeecd8bd845c9107f61db04&mc_channel=syzt5  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/topic/webframe?mc_marking=88f94da97eeecd8bd845c9107f61db04&mc_channel=syzt5'"

                       class="r more"><span class="original">专题</span>盘点最主流的前端框架有哪些？</a>
                </p>


                <div class="imooc-list js-imooc-list clearfix">
                    <!-- 免费 1 实战 2  路径 4 -->
                    <div class="big-box clearfix">


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #00b85a;background: #00b85a url(//img.mukewang.com/5b174a9c00019d3102400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=267  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=267'"
                            >
                                <h2>深度学习</h2>
                                <p class="big-card-title">NLP 实践 TensorFlow 打造聊天机器人</p>
                                <div class="big-card-bottom">

                                    ¥348.00


                                    <span class="number"><i class="imwap-peaple"></i>175</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #00b85a;background: #00b85a url(//img4.mukewang.com/5b174a9c00019d3102400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=191  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=191'"
                            >
                                <h2>深度学习</h2>
                                <p class="big-card-title">OpenCV+TensorFlow 入门人工智能图像处理</p>
                                <div class="big-card-bottom">

                                    ¥299.00


                                    <span class="number"><i class="imwap-peaple"></i>403</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #00b85a;background: #00b85a url(//img1.mukewang.com/5b174a9c00019d3102400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('https://www.imooc.com/learn/1046  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1046'"
                            >
                                <h2>深度学习</h2>
                                <p class="big-card-title">Keras入门</p>
                                <div class="big-card-bottom">

                                    免费


                                    <span class="number"><i class="imwap-peaple"></i>2618</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #1679d3;background: #1679d3 url(//img4.mukewang.com/5b174aae00016dda02400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=153  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=153'"
                            >
                                <h2>大数据</h2>
                                <p class="big-card-title">Spark Streaming实时流处理项目实战 </p>
                                <div class="big-card-bottom">

                                    ¥388.00


                                    <span class="number"><i class="imwap-peaple"></i>673</span>

                                </div>
                            </a>
                        </div>


                    </div>

                    <div class="small-box">
                        <div class="swiper-container swiper-container-content">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=259  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=259'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/5b56952600014eb005400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">深度学习之神经网络（CNN/RNN/GAN）算法原理+实战</p>
                                                <div class="small-card-info">


                                                    中级 · 409人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥366.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1021  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1021'"
                                        >
                                            <img data-original="//img4.mukewang.com/5b4705c90001fc9506000338-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">私有区块链，我们一起GO</p>
                                                <div class="small-card-info">


                                                    中级 · 9645人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=128  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=128'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/59eebab000013cce05400300-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">10小时入门大数据</p>
                                                <div class="small-card-info">


                                                    初级 · 1305人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥188.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                </div>
                                <div class="swiper-slide">


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/994  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/994'"
                                        >
                                            <img data-original="//img.mukewang.com/5afe7ffa00018fff06000338-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">TensorFlow与Flask结合打造手写体数字识别</p>
                                                <div class="small-card-info">


                                                    中级 · 8419人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=271  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=271'"
                                        >
                                            <img data-original="//img1.sycdn.imooc.com/szimg/5b7d48a2000193a006000338-360-202.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">掌握Spark机器学习库 大数据开发技能更进一步</p>
                                                <div class="small-card-info">


                                                    中级 · 72人在学

                                                </div>

                                                <div class="small-card-price ">

                                                    ¥199.00

                                                </div>

                                            </div>
                                        </a>
                                    </div>


                                    <div class="small-card clearfix">
                                        <a href="javascript:if(confirm('https://www.imooc.com/learn/988  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/988'"
                                        >
                                            <img data-original="//img4.mukewang.com/5ae3e5b80001818c06000338-590-330.jpg"
                                                 class="small-card-banner l lazy">
                                            <div class="l">
                                                <p class="small-card-title">区块链技术核心概念与原理讲解</p>
                                                <div class="small-card-info">


                                                    入门 · 32186人在学

                                                </div>

                                                免费

                                            </div>
                                        </a>
                                    </div>


                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>

            </section>


            <!-- 热门话题 -->
            <section class="commend-topic mode fff">
                <p class="tit"><span class="icon icon-6"></span>热门话题<a href="wenda/issue.htm"

                                                                       class="r more">更多话题<i class="imwap-arrow_r"></i></a>
                </p>
                <div class="topic-list">
                    <div class="clearfix topic-period">
                        <a href="javascript:if(confirm('http://www.imooc.com/wenda/issuedetail/27  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/wenda/issuedetail/27'"
                           target="_blank" class="big-tit l">打工奋斗7万落京户VS自主创业牧马城市，如何抉择？
                            <p>【内推第2波】</p></a>
                        <img class="r" src="../img2.mukewang.com/5abc43e500012ec805120512.jpg"
                        >
                    </div>
                </div>
                <div class="line-dashed"></div>
            </section>


            <!-- 热门手记 -->
            <section class="commend-article mode fff">
                <p class="tit"><span class="icon icon-7"></span>热门手记<a href="article.htm"

                                                                       class="r more">更多手记<i class="imwap-arrow_r"></i></a>
                </p>
                <div class="article-list clearfix">

                    <div class="clearfix articl-item l">
                        <a href="javascript:if(confirm('http://www.imooc.com/article/255015  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/article/255015'"
                           target="_blank" class="big-tit">
                            <p class="title">这可能是最为详细的Docker入门吐血总结</p>
                            <p class="info">浏览7706 / 推荐63</p>

                            <img class="" src="../img3.mukewang.com/5bc82c200001581606600330.jpg.png"
                            >

                        </a>
                    </div>
                    <div class="cut-line l"></div>
                    <div class="r article-right-box">
                        <div class="clearfix articl-item">
                            <a href="javascript:if(confirm('http://www.imooc.com/article/254958  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/article/254958'"
                               target="_blank" class="big-tit">
                                <p class="title">低文凭的程序员，以后出路在哪儿</p>
                                <p class="info">浏览4668 / 推荐41</p>
                            </a>
                        </div>
                        <div class="tit-line"></div>
                        <div class="clearfix articl-item">
                            <a href="javascript:if(confirm('http://www.imooc.com/article/256416  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.imooc.com/article/256416'"
                               target="_blank" class="big-tit">
                                <p class="title">全网最详细【Java学习路线】，称霸职场，挑战20万~35万年薪！</p>
                                <p class="info">浏览2640 / 推荐44</p>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="line-dashed"></div>
            </section>


            <!-- 猿问精选 -->
            <section class="commend-wenda mode fff">
                <p class="tit"><span class="icon icon-12 imwap-Q-n-A"></span>猿问精选<a href="wenda/index.htm"

                                                                                    class="r more">更多猿问<i
                                class="imwap-arrow_r"></i></a></p>
                <dl class="wenda-recommend-list">

                    <dd>
                        <a href="wenda/detail/440972.htm"
                           target="_blank">
                            <p class="title">path里面的/和*有什么区别？</p>
                            <span>共1个回答</span>
                        </a>
                    </dd>

                    <dd>
                        <a href="wenda/detail/440924.htm"
                           target="_blank">
                            <p class="title">CenOS6.8用浏览器登录ftp服务器503问题</p>
                            <span>共1个回答</span>
                        </a>
                    </dd>

                    <dd>
                        <a href="wenda/detail/440677.htm"
                           target="_blank">
                            <p class="title">为什么标签设置透明度会影响其他标签？</p>
                            <span>共1个回答</span>
                        </a>
                    </dd>

                </dl>
            </section>


            <!-- 猜你喜欢 -->
            <section class="guess-like mode fff">
                <p class="tit"><span class="icon icon-10"></span>猜你喜欢</p>
                <div class="like-list js-like-list clearfix">


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=173  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=173'"
                        >
                            <img data-original="//img1.sycdn.imooc.com/szimg/5a4d9b04000137b605400300-360-202.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">专为初学者打造的软件测试入门的首选课堂</p>
                                <div class="small-card-info">


                                    中级 · 319人在学

                                </div>

                                <div class="small-card-price ">

                                    ¥199.00

                                </div>

                            </div>
                        </a>
                    </div>


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('http://coding.m.imooc.com/classindex.html?cid=53  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://coding.m.imooc.com/classindex.html?cid=53'"
                        >
                            <img data-original="//img1.sycdn.imooc.com/szimg/582d71ae00017d5905400300-360-202.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">安卓自动化测试入门 Python篇</p>
                                <div class="small-card-info">


                                    初级 · 1110人在学

                                </div>

                                <div class="small-card-price ">

                                    ¥148.00

                                </div>

                            </div>
                        </a>
                    </div>


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1067  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1067'"
                        >
                            <img data-original="//img4.mukewang.com/5bd2aff70001de4906000338-590-330.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">redis计数器与数量控制</p>
                                <div class="small-card-info">


                                    入门 · 108人在学

                                </div>

                                免费

                            </div>
                        </a>
                    </div>


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1066  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1066'"
                        >
                            <img data-original="//img2.mukewang.com/5bd01cf40001666806000338-590-330.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">iris+xorm Go语言开发球星库</p>
                                <div class="small-card-info">


                                    中级 · 739人在学

                                </div>

                                免费

                            </div>
                        </a>
                    </div>


                    <div class="big-box clearfix">


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #42a4f0;background: #42a4f0 url(//img4.mukewang.com/5b174ac00001bbf102400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('https://www.imooc.com/learn/1064  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1064'"
                            >
                                <h2>云计算</h2>
                                <p class="big-card-title">2018 AWS技术峰会 人工智能分论坛</p>
                                <div class="big-card-bottom">

                                    免费


                                    <span class="number"><i class="imwap-peaple"></i>1172</span>

                                </div>
                            </a>
                        </div>


                        <div class="big-card l cd"
                             style="box-shadow: 0 4px 16px 0 #ff9500;background: #ff9500 url(//img1.mukewang.com/5b174b4e000142df02400240.jpg) no-repeat right;">
                            <a href="javascript:if(confirm('https://www.imooc.com/learn/1062  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1062'"
                            >
                                <h2>APPUI设计</h2>
                                <p class="big-card-title">移动界面设计</p>
                                <div class="big-card-bottom">

                                    免费


                                    <span class="number"><i class="imwap-peaple"></i>1874</span>

                                </div>
                            </a>
                        </div>


                    </div>


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1060  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1060'"
                        >
                            <img data-original="//img4.mukewang.com/5bc8201500017bb306000338-590-330.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">Android性能优化之图片优化</p>
                                <div class="small-card-info">


                                    中级 · 533人在学

                                </div>

                                免费

                            </div>
                        </a>
                    </div>


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1059  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1059'"
                        >
                            <img data-original="//img3.mukewang.com/5bbf2def000118ab06000336-590-330.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">Springboot 微信小程序 – 微信登录功能实战</p>
                                <div class="small-card-info">


                                    入门 · 2094人在学

                                </div>

                                免费

                            </div>
                        </a>
                    </div>


                    <div class="small-card clearfix">
                        <a href="javascript:if(confirm('https://www.imooc.com/learn/1058  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='https://www.imooc.com/learn/1058'"
                        >
                            <img data-original="//img2.mukewang.com/5bbafd180001688d06000338-590-330.jpg"
                                 class="small-card-banner l lazy">
                            <div class="l">
                                <p class="small-card-title">Spring Boot 2.0深度实践之系列总览</p>
                                <div class="small-card-info">


                                    高级 · 5390人在学

                                </div>

                                免费

                            </div>
                        </a>
                    </div>


                </div>
                <a href="javascript:void(0);" class="loading-more js-load-imooc" data-flag="more">点击加载更多</a>
            </section>


        </div>

    </div>
</div>


@include('wap.public.foot')
