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
            background: black;
            background-size: cover;
        }

        .h-490x{
            height: 100%!important;
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

    @yield("body")	
    @include("layout.footer")
    <script src="{{asset("assets/plugin-frameworks/jquery-3.2.1.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/plugin-frameworks/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/plugin-frameworks/swiper.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/common/scripts.js")}}" type="text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('layout.apps')
	@yield("scripts")
</body>
</html>