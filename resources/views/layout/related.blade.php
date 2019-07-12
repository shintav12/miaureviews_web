<div class="mt-50 mb-20">
    <div class="row">
        <div class="mb-30 col-12">
            <h3 style="font-weight: bolder;">Relacionados</h3>
        </div>
    </div>
    <div class="row">
    @foreach($related_items as $item)
        <div class="item col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-30" style="cursor:pointer"  data-url="<?php echo url('/'.$slug.'/'.$item->slug) ?>" >
            <div class="card h-100 min-h-350x" style="width:100%">
                <div class="bg-white h-100">
                <?php $images = explode(",", $item->images)?>
                    <div class="h-50 bg-10"style="background: url(<?php echo config('app.path_url').$images[0] ?>) no-repeat center; background-size: cover;"></div>
                    <div class="plr-25 ptb-15 h-50">
                        <div class="dplay-tbl">
                            <div class="dplay-tbl-cell">
                                <h5 class="color-ash"><b>{{$item->title}}</b></h5>
                                <h4 class="mtb-10">
                                    <a href="<?php echo url('/'.$slug.'/'.$item->slug) ?>"><b>{{$item->subtitle}}</b></a></h4>
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
    </div><!-- row-->	
</div><!-- mt-50 mb-20-->	