<header class="header">
    <nav class="navigation">
      <div class="container-fluid">
        <div class="navigation__column left">
          <div class="header__logo"><a class="ps-logo" style="width: 100%" href="{{route('home')}}">
            <img src="{{asset('frontend/images/logo-defonseca.svg')}}" alt=""></a></div>
        </div>
        <div class="navigation__column center">
              <ul class="main-menu menu">
                <li class="menu-item"><a href="{{route('home')}}">Accueil</a>
                </li>
                @foreach (App\Models\Category::where(['status'=>'active','is_parent' => 1])->get() as $gcat)
                <li class="menu-item menu-item-has-children dropdown"><a>{{$gcat->title}}</a>
                    <ul class="sub-menu">
                        @foreach (App\Models\Category::where(['status'=>'active','parent_id' => $gcat->id])->get() as $scat)
                      <li class="menu-item"><a href="{{route('product.category',$scat->slug)}}">{{$scat->title}}</a></li>

                      @endforeach
                    </ul>
                </li>
                @endforeach


                <li class="menu-item"><a href="{{route('contact.us')}}">Contact</a>
                </li>
              </ul>
        </div>
        <div class="navigation__column right">
          <form class="ps-search--header" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search Product…">
            <button><i class="ps-icon-search"></i></button>
          </form>

          <div class="menu-toggle"><span></span></div>
        </div>
      </div>
    </nav>
  </header>
  <div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
      <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Shoe Store</p>
      <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Shoe Store</p>
      <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Shoe Store</p>
    </div>
  </div>
