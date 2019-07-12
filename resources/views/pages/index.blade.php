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
		border: 1px solid #00e6a6;
		background: #00e6a6;
		border-radius: 5px;
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
					<div class="row">
						@foreach($phrases as $phrase)
						<div class="col-md-6 col-lg-6 col-xl-4 mb-30">
							<div class="card h-100 bg-white">
								<div class="plr-25 ptb-15">
									<h5 class="color-ash"><b>{{$phrase->title}}</b></h5>
									<h4 class="mtb-10"><b>{{$phrase->text}}</b></a></h4>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					<div class="row">
						<div class="col-sm-12 mb-30 swiper-area ">
							<div class="videoWrapper">
								<?php echo json_decode($videos[0]->video)?>
								<?php unset($videos[0])?>
							</div>
						</div>
					</div>

					
					<h4 class="mb-30 mt-20 clearfix"><b>QUÉ HAY DE NUEVO EN MI CABEZA</b></h4>
					@if(isset($posts[0]))
					<div class="row">
					<div class="item col-sm-12 col-md-12 col-lg-6 col-xl-8 mb-30" style="cursor:pointer" data-url="{{url('/posts/'.$posts[0]->slug)}}">
							<div class="card h-100 h-xs-500x">
								<div class="sided-half sided-xs-half h-100 bg-white">
									<div class="s-left w-50 w-xs-100 h-100 h-xs-50 pos-relative">
										<?php $images = explode(",",$posts[0]->images)?>
										<div class="bg-2 abs-tblr" style="background: url(<?php echo config('app.path_url').$images[1] ?>) no-repeat center;background-size: cover;"></div></div>
									<div class="s-right w-50 w-xs-100 h-xs-50">
										<div class="plr-25 ptb-25 h-100">
											<div class="dplay-tbl">
												<div class="dplay-tbl-cell">
													<h5 class="color-ash"><b>{{$posts[0]->title}}</b></h5>
													<h2 class="mtb-10"><a href="{{url('/posts/'.$posts[0]->slug)}}">
														<b>{{$posts[0]->subtitle}}</b></a></h2>
													<ul class="list-li-mr-10 color-lt-black">
													<li><?php echo(date("d/m/Y", strtotime($posts[0]->created_at)))?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						@if(isset($posts[1]))
						<div class="item col-sm-12 col-md-12 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="{{url('/posts/'.$posts[1]->slug)}}">
							<?php $images = explode(",",$posts[1]->images)?>
							<div class="card pos-relative h-100 bg-8 bg-layer-4 color-white" style="background: url(<?php echo config('app.path_url').$images[4] ?>) no-repeat center;background-size: cover;">
								<div class="plr-25 ptb-15 h-100">
									<div class="dplay-tbl">
										<div class="dplay-tbl-cell">
											<h5 class="color-grey"><b>{{$posts[1]->title}}</b></h5>
											<h2 class="mtb-10"><a href="{{url('/posts/'.$posts[1]->slug)}}">
												<b>{{$posts[1]->subtitle}}</b></a></h2>
											<ul class="list-li-mr-10 color-grey">
											<li><?php echo(date("d/m/Y", strtotime($posts[1]->created_at)))?></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						@if(isset($posts[2]))
						<div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="{{url('/posts/'.$posts[2]->slug)}}">
							<div class="card h-100 bg-white">
								<div class="plr-25 ptb-15 h-100">
									<div class="dplay-tbl">
										<div class="dplay-tbl-cell">
											<h5 class="color-ash"><b>{{$posts[2]->title}}</b></h5>
											<h4 class="mtb-10"><a href="{{url('/posts/'.$posts[2]->slug)}}"><b>{{$posts[2]->subtitle}}</b></a></h4>
											<ul class="list-li-mr-10 color-lt-black">
											<li><?php echo(date("d/m/Y", strtotime($posts[2]->created_at)))?></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						@if(isset($posts[3]))
						<div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="{{url('/posts/'.$posts[3]->slug)}}">
							<?php $images = explode(",",$posts[3]->images)?>
							<div class="card h-100 pos-relative bg-4 bg-layer-4 color-white" style="background: url(<?php echo config('app.path_url').$images[3] ?>) no-repeat center;background-size: cover;">
								<div class="plr-25 ptb-15">
									<h5 class="color-grey"><b>{{$posts[3]->title}}</b></h5>
									<h4 class="mtb-10"><a href="{{url('/posts/'.$posts[3]->slug)}}"><b>{{$posts[3]->subtitle}}</b></a></h4>
									<ul class="list-li-mr-10 color-grey">
									<li><?php echo(date("d/m/Y", strtotime($posts[3]->created_at)))?></li>
									</ul>
								</div>
							</div>
						</div>
						@endif
						@if(isset($posts[4]))
						<div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="{{url('/posts/'.$posts[4]->slug)}}">
							<?php $images = explode(",",$posts[4]->images)?>
							<div class="card h-100 pos-relative bg-4 bg-layer-4 color-white" style="background: url(<?php echo config('app.path_url').$images[3] ?>) no-repeat center;background-size: cover;">
								<div class="plr-25 ptb-15">
									<h5 class="color-grey"><b>{{$posts[4]->title}}</b></h5>
									<h4 class="mtb-10"><a href="{{url('/videos/'.$posts[4]->slug)}}"><b>{{$posts[4]->subtitle}}</b></a></h4>
									<ul class="list-li-mr-10 color-grey">
									<li><?php echo(date("d/m/Y", strtotime($posts[4]->created_at)))?></li>
									</ul>
								</div>
							</div>
						</div>
						@endif
					</div>
					<h4 class="mb-30 mt-20 clearfix"><b>LOS VIDEOS CALIENTITOS</b></h4>
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