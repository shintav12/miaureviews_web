<header style="background: black;">
    <a class="logo" href="{{url('/')}}"><img src="{{asset('assets/images/icono-logo-web.png')}}" alt="Logo"></a>
    <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
    <div class="right-area" >
        <div style="margin-top:5%">
            <a class="plr-20 btn-brdr-grey color-white btn-brdr-grey2" style="padding-left: 40px!important;padding-right: 40px!important;"
             target="_blank" href="https://www.youtube.com/channel/UC8OmB2Ln7n7hcH1j_5uXIFg?sub_confirmation=1">
                <b>¡&Uacute;NETENOS!</b>
            </a>
        </div>
    </div>
    <ul class="main-menu" id="main-menu">
        <?php foreach($categories as $category){?>
            <li>
                <a href="{{url('/category/'.$category->slug)}}">
                    <?php if(isset($slug)) {
                        if($slug == $category->slug) {?>
                            <img src="{{asset('assets/images/'.$category->slug.'-amarillo.png')}}" />
                        <?php } else { ?>
                            <img src="{{asset('assets/images/'.$category->slug.'-blanco.png')}}" />
                        <?php }
                    } else{ ?>
                        <img src="{{asset('assets/images/'.$category->slug.'-blanco.png')}}" />
                    <?php } ?>
                </a>
            </li>
        <?php }?>
    </ul>
    <div class="clearfix"></div>
</header>