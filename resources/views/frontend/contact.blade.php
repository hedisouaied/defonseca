@extends('frontend.layouts.master')

@section('content')
<main class="ps-main">
    <div class="ps-contact ps-section pb-80">
      <div id="contact-map" data-address="New York, NY" data-title="Shoe Store!" data-zoom="17"></div>
      <div class="ps-container">
        <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="ps-section__header mb-50">
                  <h2 class="ps-section__title" data-mask="Contact">- Nous contacter</h2>
                  <form class="ps-contact__form" method="POST" action="{{route('contact.submit')}}" >
                    @csrf
                    <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Nom <sub>*</sub></label>
                              <input class="form-control" type="text" placeholder="Nom" name="name">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Prénom <sub>*</sub></label>
                              <input class="form-control" type="text" placeholder="Prénom" name="lastname">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Email <sub>*</sub></label>
                              <input class="form-control" type="email" placeholder="Email" name="email">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Téléphone <sub>*</sub></label>
                              <input class="form-control" type="phone" placeholder="Numéro de téléphone" name="phone">
                            </div>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="form-group mb-25">
                              <label>Votre Message <sub>*</sub></label>
                              <textarea class="form-control" rows="6" name="content"></textarea>
                            </div>
                            <div class="form-group">
                              <button class="ps-btn">Envoyer Message<i class="ps-icon-next"></i></button>
                            </div>
                          </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="ps-section__content">
                  <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 ">
                          <div class="ps-contact__block" data-mh="contact-block">
                            <header>
                              <h3>TUNIS </h3>
                            </header>
                            <footer>
                              <p><i class="fa fa-map-marker"></i> 35-43 Av. Habib Bourguiba, Tunis</p>
                              <p><i class="fa fa-envelope-o"></i><a href="mailto:lepantoufle2017@gmail.com">lepantoufle2017@gmail.com</a></p>
                              <p><i class="fa fa-phone"></i> ( +216 ) 58 988 332</p>
                            </footer>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
@if(session()->has('success'))

<script>
 $(document).ready(function () {
alertify.set('notifier','position','bottom-left');
alertify.success('{{session()->get('success')}}');
 });
</script>
@endif
@endsection
