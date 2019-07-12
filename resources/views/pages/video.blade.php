@extends("templates.video")

@section("styles")
<style>
	p a {
		color: #ffc107 !important;
	}
</style>
@endsection

@section("scripts")
<script>
	$(".item").click(function(){
		var url = $(this).data("url");
		window.location.href = url;
	});
</script>
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
@endsection

@section("body")
<section class="bg-1-white ptb-0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-md-12 col-lg-8 ptb-50 pr-30 pr-md-15">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="sided-70x">
								<div>
									<p class="ptb-20 color-ash"><b>{{$item->subtitle}}</b></p>
								</div>
							</div>
						</div>
						<!-- <div class="col-sm-12 col-md-6">
							<ul class="color-ash lh-70 text-right text-sm-left list-a-plr-10 font-13">
								<li><b>COMPARTIR</b></li>
								<li><a href="#"><i class="color-facebook ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="color-twitter ion-social-twitter"></i></a></li>
								<li><a href="#"><i class="color-google ion-social-google"></i></a></li>
							</ul>
						</div> -->
                    </div>
                    <div class="mt-40 mt-sm-10">
                        <div class="videoWrapper">
                            <?php echo($item->video)?>
                        </div>
					</div>		
					<div class="mt-40 mt-sm-10 content-post">
						<?php echo($item->text)?>
                    </div>			
                    @include("layout.tags")
					<div class="brdr-grey-1 mt-50 mt-sm-20"></div>
					@include("layout.related")
				</div><!-- col-sm-9 -->
				@include("layout.ads")
			</div><!-- row -->
		</div><!-- container -->
	</section>
@endsection