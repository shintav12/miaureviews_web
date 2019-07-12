@extends("templates.tag")

@section("styles")
@endsection

@section("scripts")
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
                    @foreach($items as $item)
							<div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer" data-url="<?php echo url('/'.$item->type.'/'.$item->slug) ?>" >
								<div class="card h-100 min-h-350x">
									<div class="bg-white h-100">
									<?php 
										$images = explode(",", $item->images);
										$pos = 0;?>
										<div class="h-50 bg-10"style="background: url(<?php echo config('app.path_url').$images[$pos] ?>) no-repeat center; background-size: cover;"></div>
										<div class="plr-25 ptb-15 h-50">
											<div class="dplay-tbl">
												<div class="dplay-tbl-cell">
													<h5 class="color-ash"><b>{{$item->title}}</b></h5>
													<h4 class="mtb-10">
														<a href="<?php echo url('/'.$item->type.'/'.$item->slug) ?>"><b>{{$item->subtitle}}</b></a></h4>
													<ul class="list-li-mr-10 color-lt-black">
													<li><?php echo(date("d/m/Y", strtotime($item->created_at)))?></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
                    </div>
                    @if(count($items) > 6)
						<h6 class="text-center mt-20"><a class="btn-brdr-grey color-ash plr-30" href="#"><b>LOAD MORE</b></a></h6>
					@endif
                </div>
                <!-- col-sm-9 -->

                @include("layout.ads")
                <!-- col-sm-3 -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
@endsection