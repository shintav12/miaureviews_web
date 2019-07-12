@extends("templates.freebie")

@section("styles")
    <link href="{{asset("assets/plugin-frameworks/assets/owl.carousel.min.css")}}" rel="stylesheet" type="text/css" />
    <style>
        .owl-carousel .owl-stage {
            display: flex;
            align-items: center;
        }

        .owl-carousel .caption {
            text-align: center;
        }
        p a {
            color: #ffc107 !important;
        }
        .content-post ul li{
            list-style: inherit;
            display: list-item;
            font-size: inherit;
        }
        .content-post ul {
            padding-left:40px;

        }
        .item{
            display: flex;
            justify-content: space-around;
            align-content: center;
        }
        #carousel .item{
            cursor:grab;
            cursor:-webkit-grab;
        }

        #carousel .item img {
            display: block;
            width: 100%;
            height: auto;
        }

        /* Styling Pagination*/
        .owl-theme .owl-controls .owl-page span{
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            width: 100px;
            height: 5px;
            margin-left: 2px;
            margin-right: 2px;
            background: #ccc;
            border:none;
        }

        .owl-dots{
            display: flex;
            justify-content: center;
            padding-top: 8px;
        }

        .owl-dot{
            width: 10px !important;
            height: 10px !important;
            background: #aaa !important;
            border-radius: 100px !important;
            margin: 8px;
            
        }

        .owl-dot.active{
            background: #6c757d !important;
        }
        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls.clickable .owl-page:hover span{
            background: #3F51B5;
        }
    </style>
@endsection

@section("scripts")
    <script src="{{asset('assets/plugin-frameworks/owl.carousel.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            var text = document.getElementsByClassName('yt-uix-button')[0].getAttribute("data-is-subscribed");
            console.log(text);
        });
        $(".item_click").click(function(){
            var url = $(this).data("url");
            window.location.href = url;
        });
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            items: 1,
            center: true,
            dots: true
        });
    </script>
    <script src="https://apis.google.com/js/platform.js"></script>
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
                                    <p class="ptb-20 color-ash"><b>{{$item->title}}</b></p>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-sm-12 col-md-6">--}}
                        {{--<ul class="color-ash lh-70 text-right text-sm-left list-a-plr-10 font-13">--}}
                        {{--<li><b>COMPARTIR</b></li>--}}
                        {{--<li><a href="#"><i class="color-facebook ion-social-facebook"></i></a></li>--}}
                        {{--<li><a href="#"><i class="color-twitter ion-social-twitter"></i></a></li>--}}
                        {{--<li><a href="#"><i class="color-google ion-social-google"></i></a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                    <div class="owl-carousel">
                        @foreach($images as $image)
                            <div class="item">
                                <img src="{{config('app.path_url').$image}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="brdr-grey-1 mt-40 mt-sm-20"></div>
                    <div class="mt-20 mt-sm-10" style="display: flex; align-items: center; justify-content: space-between">
                        <div style="font-size: 1.3em; color: gray; padding-right: 15px">
                            <b>Recoge tu WAO regalo aqu&iacute y ayuda a la pipol suscribiendote:</b>
                        </div>

                    </div>
                    <div class="mt-20 mt-sm-10" style="display: flex; align-items: center; justify-content: space-between; flex-direction: row">
                        <div style="display: flex; align-items: center;">
                            <div class="g-ytsubscribe" data-channelid="UC8OmB2Ln7n7hcH1j_5uXIFg" data-layout="full" data-count="hidden"></div>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <a href="{{config('app.path_url').$item->download}}" class="plr-70 btn-brdr-grey color-white" style="color: white"><b>DESCARGAR</b></a>
                        </div>
                    </div>
                    <div class="brdr-grey-1 mt-40 mt-sm-20"></div>
                    <div class="mt-40 mt-sm-10 content-post">
                        <?php echo($item->content)?>
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
