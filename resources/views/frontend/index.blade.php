@extends('frontend.layouts.master')


@section('content')


  <main class="ps-main">

    <div class="ps-banner">
      <div class="rev_slider fullscreenbanner" id="home-banner">
        <ul>
            @foreach ($banners as $slider)
          <li class="ps-banner" data-index="rs-{{$slider->id}}" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0">
            <img class="rev-slidebg" src="{{$slider->photo}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
            <div class="tp-caption ps-banner__header" id="layer-1" data-x="left" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
              <p>{!!$slider->description!!}</p>
            </div>
            <div class="tp-caption ps-banner__title" id="layer21{{$slider->id}}" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
              <p class="text-uppercase">{{$slider->title}}</p>
            </div>
          </li>
          @endforeach

        </ul>
      </div>
    </div>
    <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
      <div class="ps-container">
        <div class="ps-section__header mb-50">
          <h3 class="ps-section__title" data-mask="Dérnier produits">- Dérnier produits</h3>
        </div>
        <div class="ps-section__content pb-50">
          <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
            <div class="ps-masonry">
              <div class="grid-sizer"></div>
            @foreach ($products as $item)
            @php
                $photo = explode(',',$item->photo);
            @endphp

              <div class="grid-item nike">
                <div class="grid-item__content-wrapper">
                  <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail"><div class="ps-badge"><span>Nouveau</span></div>
                    <img src="{{$photo[0]}}" alt=""><a class="ps-shoe__overlay" href="{{route('product.detail',$item->slug)}}"></a>
                    </div>
                    <div class="ps-shoe__content">
                      <div class="ps-shoe__variants">
                        <div class="ps-shoe__variant normal">
                            @foreach ($photo as $ph)
                            <img src="{{$ph}}" alt="">
                            @endforeach


                        </div>
                      </div>
                      <div class="ps-shoe__detail"><a class="ps-shoe__name" title="{{substr($item->title,0,20)}}" href="{{route('product.detail',$item->slug)}}">{{substr($item->title,0,20)}}</a>
                        <span class="ps-shoe__price"> {{$item->price}} DT</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ps-section--offer">
      <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{asset('frontend/images/banner/left-banner.jpg')}}" alt=""></a></div>
      <div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="{{asset('frontend/images/banner/right-banner.jpg')}}" alt=""></a></div>
    </div>
    <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
      <div class="ps-container">
        <div class="ps-section__header mb-50">
          <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                  <h3 class="ps-section__title" data-mask="Nos suggestions">- Nos suggestions</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                  <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prec</a><a class="ps-next" href="#">Proch<i class="ps-icon-arrow-left"></i></a></div>
                </div>
          </div>
        </div>
        <div class="ps-section__content">
          <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach ($randomproducts as $rand)
            @php
                $photo = explode(',',$rand->photo);
            @endphp
            <div class="ps-shoes--carousel">
              <div class="ps-shoe">
                <div class="ps-shoe__thumbnail">
                  <img src="{{$photo[0]}}" alt=""><a class="ps-shoe__overlay" href="{{route('product.detail',$rand->slug)}}"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal">
                        @foreach ($photo as $ph)
                            <img src="{{$ph}}" alt="">
                            @endforeach
                    </div>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route('product.detail',$rand->slug)}}">{{substr($rand->title,0,20)}}</a>
                    <span class="ps-shoe__price"> {{$rand->price}} DT</span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="ps-home-testimonial bg--parallax pb-80" data-background="{{asset('frontend/images/background/parallax.jpg')}}">
      <div class="container">
        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
          <div class="ps-testimonial">
            <div class="ps-testimonial__thumbnail"><img src="{{asset('frontend/images/testimonial/1.jpg')}}" alt=""><i class="fa fa-quote-left"></i></div>
            <header>
              <select class="ps-rating">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="5">5</option>
              </select>
              <p>Logan May - CEO & Founder Invision</p>
            </header>
            <footer>
              <p>“Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake biscuit cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant. “</p>
            </footer>
          </div>
          <div class="ps-testimonial">
            <div class="ps-testimonial__thumbnail"><img src="{{asset('frontend/images/testimonial/2.jpg')}}" alt=""><i class="fa fa-quote-left"></i></div>
            <header>
              <select class="ps-rating">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="5">5</option>
              </select>
              <p>Logan May - CEO & Founder Invision</p>
            </header>
            <footer>
              <p>“Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake biscuit cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant. “</p>
            </footer>
          </div>
          <div class="ps-testimonial">
            <div class="ps-testimonial__thumbnail"><img src="{{asset('frontend/images/testimonial/3.jpg')}}" alt=""><i class="fa fa-quote-left"></i></div>
            <header>
              <select class="ps-rating">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="5">5</option>
              </select>
              <p>Logan May - CEO & Founder Invision</p>
            </header>
            <footer>
              <p>“Dessert pudding dessert jelly beans cupcake sweet caramels gingerbread. Fruitcake biscuit cheesecake. Cookie topping sweet muffin pudding tart bear claw sugar plum croissant. “</p>
            </footer>
          </div>
        </div>
      </div>
    </div>

@endsection
