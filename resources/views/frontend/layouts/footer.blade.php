  <div class="ps-footer bg--cover" data-background="{{asset('frontend/images/background/footer-bg.jpg')}}">
    <div class="ps-footer__content" style="padding: 0px">
      <div class="ps-container">
        <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                <aside class="ps-widget--footer ps-widget--info">
                  <header><a class="ps-logo" style="width: 100%;padding-top: 15px;" href="{{route('home')}}"><img src="{{asset('frontend/images/logo-defonseca-white.svg')}}" alt=""></a>
                    <h3 class="ps-widget__title">TUNIS</h3>
                  </header>
                  <footer>
                    <p><strong>35-43 Av. Habib Bourguiba, Tunis</strong></p>
                    <p>Email: <a href='mailto:lepantoufle2017@gmail.com'>lepantoufle2017@gmail.com</a></p>
                    <p>Tél: ( +216 ) 58 988 332</p>
                  </footer>
                </aside>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

              </div>
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">

              </div>
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                <aside class="ps-widget--footer ps-widget--link">
                  <header>
                    <h3 class="ps-widget__title">Plan du site</h3>
                  </header>
                  <footer>
                    <ul class="ps-list--line">
                      <li><a href="{{route('home')}}">Accueil</a></li>

                      <li><a href="{{route('contact.us')}}">Contact</a></li>
                    </ul>
                  </footer>
                </aside>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                <aside class="ps-widget--footer ps-widget--link">
                  <header>
                    <h3 class="ps-widget__title">Produits</h3>
                  </header>
                  <footer>
                    <ul class="ps-list--line">
                        @foreach (App\Models\Category::where(['status'=>'active','is_parent' => 1])->get() as $gcat)
                      <li><a>{{$gcat->title}}</a></li>
                      @foreach (App\Models\Category::where(['status'=>'active','parent_id' => $gcat->id])->get() as $scat)
                      <li><a href="{{route('product.category',$scat->slug)}}">{{$scat->title}}</a></li>
                      @endforeach
                      @endforeach

                    </ul>
                  </footer>
                </aside>
              </div>
        </div>
      </div>
    </div>
    <div class="ps-footer__copyright" style="padding: 0px">
      <div class="ps-container">
        <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <p>&copy; <a href="#">Defonsica</a>, Inc. Tous les droits sont réservés. Développé par <a href="https://tounesconnect.com/" target="_blank"> TounesConnect</a></p>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <ul class="ps-social">
                  <li><a href="https://www.facebook.com/DefonsecaLac1/" target="_blank"><i class="fa fa-facebook"></i></a></li>

                  <li><a href="https://www.instagram.com/defonseca_tunis/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
        </div>
      </div>
    </div>
  </div>
</main>
