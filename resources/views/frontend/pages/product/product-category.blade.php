@extends('frontend.layouts.master')

@section('content')

  <main class="ps-main">
    <div class="ps-products-wrap pt-80 pb-80">
      <div class="ps-products" data-mh="product-listing">
                <div class="ps-product-action">
                    <div class="ps-product__filter">
                        <select class="ps-select " id="sortBy" name="sortby">
                            <option selected>Dérnier</option>
                            <option @if (isset($_GET['sort'])&& ($_GET['sort'] == 'titleAsc'))
                                selected
                            @endif value="titleAsc">Alphabétique (croissant)</option>
                            <option @if (isset($_GET['sort'])&& ($_GET['sort'] == 'titleDesc')) selected  @endif value="titleDesc">Alphabétique (décroissant)</option>
                            <option @if (isset($_GET['sort'])&& ($_GET['sort'] == 'priceAsc')) selected @endif value="priceAsc">Prix (croissant)</option>
                            <option @if (isset($_GET['sort'])&& ($_GET['sort'] == 'priceDesc'))  selected @endif value="priceDesc">Prix (décroissant)</option>
                        </select>
                    </div>
                </div>
                <div class="ps-product__columns" >
                    @foreach ($products as $item)
                    @php
                        $photo = explode(',',$item->photo);
                    @endphp
                        <div class="ps-product__column">
                            <div class="ps-shoe mb-30">
                            <div class="ps-shoe__thumbnail">
                                <img src="{{$photo[0]}}" alt="">
                                <a class="ps-shoe__overlay" href="{{route('product.detail',$item->slug)}}"></a>
                            </div>
                            <div class="ps-shoe__content">
                                <div class="ps-shoe__variants">
                                    <div class="ps-shoe__variant normal">
                                    @foreach ($photo as $ph)
                                    <img src="{{$ph}}" alt="">
                                    @endforeach
                                    </div>
                                </div>
                                <div class="ps-shoe__detail">
                                    <a class="ps-shoe__name" href="{{route('product.detail',$item->slug)}}">{{$item->title}}</a>
                                 <span class="ps-shoe__price">{{$item->price}} DT</span>
                                </div>
                            </div>
                         </div>
                        </div>
                    @endforeach

                </div>

                @if (count($products)==0)


                    <p>Il n'y a pas de produits</p>
                @endif
      </div>
      <div class="ps-sidebar" data-mh="product-listing">
        @foreach (App\Models\Category::where(['status'=>'active','is_parent' => 1])->get() as $gcat)

        <aside class="ps-widget--sidebar ps-widget--category">
          <div class="ps-widget__header">

            <h3>{{$gcat->title}}</h3>

          </div>
          <div class="ps-widget__content">
            <ul class="ps-list--checked">
                @foreach (App\Models\Category::where(['status'=>'active','parent_id' => $gcat->id])->get() as $scat)
              <li class="current"><a href="{{route('product.category',$scat->slug)}}">{{$scat->title}}({{\App\Models\Product::where('child_cat_id',$scat->id)->count()}})</a></li>
              @endforeach
            </ul>
          </div>
        </aside>
        @endforeach
      </div>
    </div>

@endsection

@section('scripts')

<script>
    $('#sortBy').change(function(){
        var sort=$('#sortBy').val();

        window.location="{{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;
    });
</script>
@endsection
