@extends('frontend.layouts.master')

@section('content')
<main class="ps-main">
    <div class="test">
      <div class="container">
        <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
              </div>
        </div>
      </div>
    </div>
    <div class="ps-product--detail pt-60">
      <div class="ps-container">
        <div class="row">
          <div class="col-lg-10 col-md-12 col-lg-offset-1">
            <div class="ps-product__thumbnail">
              <div class="ps-product__preview">
                <div class="ps-product__variants">
                    @php
                    $photos = explode(",",$product->photo);

                    @endphp
                    @foreach ($photos as $photo)
                  <div class="item"><img src="{{$photo}}" alt=""></div>
                  @endforeach
                </div>
              </div>
              <div class="ps-product__image">
                @php
                $photo1 = explode(",",$product->photo);

                @endphp
                @foreach ($photo1 as $ph)
                <div class="item"><img class="zoom" src="{{$ph}}" alt="" data-zoom-image="{{$ph}}"></div>
                @endforeach
              </div>
            </div>
            @php
                $ph = explode(",",$product->photo);
            @endphp
            <div class="ps-product__thumbnail--mobile">
              <div class="ps-product__main-img"><img src="{{$ph[0]}}" alt=""></div>
              <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                @php
                $photo1 = explode(",",$product->photo);

                @endphp
                @foreach ($photo1 as $ph)
                  <img src="{{$ph}}" alt="">
                  @endforeach
            </div>
            </div>
            <div class="ps-product__info">
              <h1>{{$product->title}}</h1>

              <h3 class="ps-product__price">{{$product->price}} DT</h3>
              <div class="ps-product__block ps-product__quickview">
                <h4>Description</h4>
                <p>{!!$product->description!!}</p>
              </div>

              <div class="ps-product__shopping">
                <div class="ps-product__actions">
                    <a href="compare.html" title="partage sur les reseaux sociaux"><i class="ps-icon-share"></i></a>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

          </div>
        </div>
      </div>
    </div>
    <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
      <div class="ps-container">
        <div class="ps-section__header mb-50">
          <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                  <h3 class="ps-section__title" data-mask="Related item">- VOUS POUVEZ AUSSI AIMEZ</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                  <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prec</a><a class="ps-next" href="#">Proch<i class="ps-icon-arrow-left"></i></a></div>
                </div>
          </div>
        </div>
        <div class="ps-section__content">
          <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach ($product->rel_prods as $related)
            @php
                $photos = explode(",",$related->photo);
            @endphp
            <div class="ps-shoes--carousel">
              <div class="ps-shoe">
                <div class="ps-shoe__thumbnail">
                  <img src="{{$photos[0]}}" alt=""><a class="ps-shoe__overlay" href="{{route('product.detail',$related->slug)}}"></a>
                </div>
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal">
                        @foreach ($photos as $ph)
                        <img src="{{$ph}}" alt="">
                        @endforeach
                    </div>
                  </div>
                  <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{route('product.detail',$related->slug)}}">{{substr($related->title,0,20)}}</a>
                    <span class="ps-shoe__price"> {{$related->price}} DT</span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endsection
