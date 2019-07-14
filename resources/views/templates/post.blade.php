<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Karellys Costa</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="google-site-verification" content="XegEF40B0N-kaKlQyRimtRALIg1ViM6acrErC94EBRs" />
	@include("layout.metas")
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">	
    <link href="{{asset("assets/plugin-frameworks/swiper.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/plugin-frameworks/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/fonts/ionicons.css")}}" rel="stylesheet" type="text/css" />
	<link href="{{asset("assets/common/styles.css")}}" rel="stylesheet" type="text/css" />
	<style>
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
	<div class="slider-main h-800x h-sm-auto pos-relative pt-95 pb-25">
		<div class="img-bg bg-16 bg-layer-6" style="background: url(<?php echo config('app.path_url').$item->image ?>) no-repeat center;background-size: cover;" ></div>
		<div class="container-fluid h-100 mt-xs-50">
			<div class="dplay-tbl">
				<div class="dplay-tbl-cell">
					<div class="row">
						<div class="col-lg-1"></div>
						<div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
							<div class="bg-white p-40 psm-30">
								<h1 class="mt-20 lh-1-2 color-ash"><b>{{$item->title}}</b></h1>
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
	@include('layout.apps')
	@yield("scripts")
</body>
	
</body>
</html>