<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Karellys Costa</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
    <meta name="google-site-verification" content="XegEF40B0N-kaKlQyRimtRALIg1ViM6acrErC94EBRs" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">	
    <link href="{{asset("assets/plugin-frameworks/swiper.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/plugin-frameworks/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/fonts/ionicons.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/common/styles.css")}}" rel="stylesheet" type="text/css" />
    @include("layout.metas")
    <style>
        .bg-custom{
            background: url("<?php echo config('app.path_url').$item->image ?>") no-repeat center;
            background-size: cover;
        }
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }
        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .bg-layer-2:after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
            opacity: 0.2;
            background: black;
        }
        .mx-w-600x{
            max-width: 80% !important;
            margin-left: 10%;
        }
        .btn-brdr-grey {
            text-align: center;
            height: 45px;
            line-height: 43px;
            border: 1px solid #00e6a6;
            background: #00e6a6;
            border-radius: 5px;
        }
        .btn-brdr-grey:hover {
            border: 1px solid #673ab7;
            background: #673ab7;
            color: white;
        }
    </style>
    @yield("styles")
</head>
<body>
    @include("layout.header")
    <div class="slider-main h-500x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-custom bg-layer-2"></div>
		<div class="container-fluid h-100 mt-xs-0">
			<div class="dplay-tbl">
                <div class="dplay-tbl-cell color-white text-center">
                    <h1 class="ptb-50"><b>{{$item->title}}</b></h1>
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