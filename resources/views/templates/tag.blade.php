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
                    <h1 class="ptb-50"><b>{{strtoupper($tag->name)}}</b></h1>
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
    @include('layout.apps')
	@yield("scripts")
</body>
</html>