<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Karellys Costa</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
    <meta name="google-site-verification" content="XegEF40B0N-kaKlQyRimtRALIg1ViM6acrErC94EBRs" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">	
    <link href="{{asset('assets/plugin-frameworks/swiper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugin-frameworks/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/fonts/ionicons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/font-icons.css')}}" rel="stylesheet"  type="text/css" />
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet"  type="text/css" />
    <link href="{{asset('assets/common/styles.css')}}" rel="stylesheet" type="text/css" />
    <style>
    .bg-custom{
        background: url("{{asset('assets/images/bg3.jpg')}}") no-repeat center;
        background-size: cover;
    }

    .bg-layer-2:after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: -1;
        opacity: 1;
        background: #ffd601;
    }
    .mx-w-600x{
        max-width: 600px!important;
    }
</style>
    @yield("styles")
</head>
<body>
	
    @include("layout.header")
    <div class="slider-main h-800x h-sm-auto pos-relative pt-95 pb-25">
        <div class="img-bg bg-custom bg-layer-2"></div>
        <div class="container-fluid h-100 mt-xs-50">
            <div class="row h-100">
                <div class="col-md-1"></div>
                <div class="col-sm-12 col-md-5 h-100 h-sm-50">
                    <div class="dplay-tbl">
                        <div class="dplay-tbl-cell color-white mtb-30">
                            <div class="mx-w-600x">
                                <img src="{{asset('assets/images/text-index.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 h-sm-50 oflow-hidden swiper-area pos-relative">	
                    <div class="abs-blr pos-sm-static">
                        <div class="row pos-relative mt-50 all-scroll">
                            <div class="swiper-scrollbar resp"></div>
                            <div class="col-md-10">
                                <h5 class="mb-50 color-white"><b>RECI&Eacute;N HORNEADO</b></h5>
                                <div class="swiper-container oflow-visible" data-slide-effect="slide" data-autoheight="false" 
                                    data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="2"
                                    data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="true"
                                    data-swpr-responsive="[1, 2, 1, 2]">
                                    <div class="swiper-wrapper">
                                        @foreach($hots as $hot)
                                        <div class="swiper-slide">
                                            <div class="bg-white">
                                                <?php $images = explode(",", $hot->images)?>
                                                <img src="<?php echo config('app.path_url').$images[0] ?>" alt="" style="cursor:pointer" class="item" data-url="<?php echo url('/'.$hot->type.'/'.$hot->slug) ?>" >
                                                <div class="plr-25 ptb-15">
                                                    <h5 class="color-ash"><b>{{$hot->title}}</b></h5>
                                                    <h4 class="mtb-10">
                                                    <a href="{{url('/'.$hot->type.'/'.$hot->slug)}}"><b>{{$hot->subtitle}}</b></a></h4>
                                                    <ul class="list-li-mr-10 color-lt-black">
                                                    <li><?php echo(date("d/m/Y", strtotime($hot->created_at)))?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield("body")
    @include("layout.footer")	
    <script src="{{asset("assets/plugin-frameworks/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/plugin-frameworks/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/plugin-frameworks/swiper.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/common/scripts.js")}}" type="text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130112687-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-130112687-2');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2895656582028706",
            enable_page_level_ads: true
        });
    </script>
	@yield("scripts")
</body>
</html>