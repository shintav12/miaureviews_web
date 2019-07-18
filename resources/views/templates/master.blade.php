<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Miau Reviews</title>
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
        background: url("{{asset('assets/images/portada-web.png')}}") no-repeat center;
        background-size: cover;
    }

    .h-490x{
        height: 570px!important;
    }

    .menu:hover img{
        background: url({{asset('assets/images/comida-y-utensilios-amarillo.png')}});
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
    }
    .mx-w-600x{
        max-width: 600px!important;
    }
</style>
    @yield("styles")
</head>
<body>
	
    @include("layout.header")
    <div class="slider-main h-490x h-sm-auto pos-relative pt-95 pb-25">
        <div class="img-bg bg-custom bg-layer-2"></div>
{{--        <div class="container-fluid h-100 mt-xs-50">--}}
{{--            <div class="row h-100">--}}
{{--                <div class="col-md-1"></div>--}}
{{--                <div class="col-sm-12 col-md-5 h-100 h-sm-50">--}}
{{--                    <div class="dplay-tbl">--}}
{{--                        <div class="dplay-tbl-cell color-white mtb-30">--}}
{{--                            <div class="mx-w-600x">--}}
{{--                                <img src="{{asset('assets/images/text-index.png')}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
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
    @include('layout.apps')
	@yield("scripts")
</body>
</html>