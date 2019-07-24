@extends("templates.master")

@section("styles")
<style>
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
	.btn-brdr-grey {
		text-align: center;
		height: 45px;
		line-height: 43px;
		border: 1px solid black;
		background: black;
		border-radius: 15px;
	}
		.btn-brdr-grey2:hover {
		border: 1px solid #673ab7;
		background: #673ab7;
		color: white;
	}
</style>
@endsection
@section("scripts")
<script>
	$fluidEl = $("body");
	var $allVideos = $("iframe[src^='//www.youtube.com']"),

		$allVideos.each(function() {
			$(this).data('aspectRatio', this.height / this.width)

				.removeAttr('height')
				.removeAttr('width');

			});
			$(window).resize(function() {

			var newWidth = $fluidEl.width();


			$allVideos.each(function() {

			var $el = $(this);
			$el.width(newWidth).height(newWidth * $el.data('aspectRatio'));
	});
	}).resize();
	</script>
	<script>
	$(".item").click(function(){
		var url = $(this).data("url");
		window.location.href = url;
	});
</script>
@endsection
@section("body")
<section class="bg-1-white ptb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-md-12 col-lg-8 ptb-50 pr-30 pr-md-15">
					<h4 class="mb-30 mt-20 clearfix"><b>Products Nuevos</b></h4>
					<div class="row">
						@foreach($products as $product)
							<div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="{{url('/store/'.$product->slug)}}">
								<div class="card h-100 min-h-350x">
									<div class="bg-white h-100">
										<?php $images = explode(",", $product->images)?>
										<div class="h-50 bg-10" style="background: url(<?php echo config('app.path_url').$images[0] ?>) no-repeat center; background-size: cover;"></div>
										<div class="plr-25 ptb-15 h-50">
											<div class="dplay-tbl">
												<div class="dplay-tbl-cell">
													<h5 class="color-ash"><b>{{$product->title}}</b></h5>
													<h4 class="mtb-10">
														<a href="{{url('/store/'.$product->slug)}}"><b>{{$product->subtitle}}</b></a></h4>
													<ul class="list-li-mr-10 color-lt-black">
														<li><?php echo(date("d/m/Y", strtotime($product->created_at)))?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<h4 class="mb-30 mt-20 clearfix"><b>Mira lo nuevo en nuestro canal</b></h4>
					<div class="row">
						<div class="col-sm-12 mb-30 swiper-area ">
							<div class="videoWrapper">
								<?php echo json_decode($videos[0]->video)?>
								<?php unset($videos[0])?>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach($videos as $video)
							<div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="{{url('/videos/'.$video->slug)}}">
								<div class="card h-100 min-h-350x">
									<div class="bg-white h-100">
									<?php $images = explode(",", $video->images)?>
										<div class="h-50 bg-10" style="background: url(<?php echo config('app.path_url').$images[0] ?>) no-repeat center; background-size: cover;"></div>
										<div class="plr-25 ptb-15 h-50">
											<div class="dplay-tbl">
												<div class="dplay-tbl-cell">
													<h5 class="color-ash"><b>{{$video->title}}</b></h5>
													<h4 class="mtb-10">
														<a href="{{url('/videos/'.$video->slug)}}"><b>{{$video->subtitle}}</b></a></h4>
													<ul class="list-li-mr-10 color-lt-black">
													<li><?php echo(date("d/m/Y", strtotime($video->created_at)))?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					@if(count($videos) > 6)
						<h6 class="text-center mt-20"><a class="btn-brdr-grey color-ash plr-30" href="#"><b>LOAD MORE</b></a></h6>
					@endif
				</div>
				@include("layout.ads")
			</div>
		</div>
	</section>
@endsection