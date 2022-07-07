<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="TounesConnect">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="UNE ÉQUIPE COMMERCIALE À VOTRE ÉCOUTE VOTRE RÉUSSITE EST NOTRE PASSION.">
    <meta property="og:locale" content="fr_FR">
    <meta name="theme-color" content="#2AC37D">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @if (isset($meta))
    {!!$meta!!}
@else
<meta itemprop="name" content="Defonseca l'étoile du lac">
<meta itemprop="description" content="UNE ÉQUIPE COMMERCIALE À VOTRE ÉCOUTE VOTRE RÉUSSITE EST NOTRE PASSION.">
<meta itemprop="image" content="{{asset('/frontend/images/banner/meta-image.jpg')}}">
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{asset('')}}" />
    <meta property="twitter:title" content="Defonseca l'étoile du lac" />
    <meta property="twitter:description" content="De Fonseca Italy est un leader italien sur le marché des pantoufles et des chaussures de plage." />
    <meta property="twitter:image" content="{{asset('/frontend/images/banner/meta-image.jpg')}}" />
    <meta property="twitter:site" content="@Defonsica" />
    <meta property="og:type" content="website" />
	<meta property="og:title" content="Defonseca l'étoile du lac" />
	<meta property="og:description" content="De Fonseca Italy est un leader italien sur le marché des pantoufles et des chaussures de plage." />
    <meta property="og:image" content='{{asset('/frontend/images/banner/meta-image.jpg')}}' />

@endif
@if (isset($title_page))
<title>{{$title_page}}</title>
@else
<title>Defonseca l'étoile du lac</title>
@endif


    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/ps-icon/style.css')}}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{asset('frontend/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/Magnific-Popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/revolution/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/revolution/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/revolution/css/navigation.css')}}">
    <!-- Custom-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>


    @yield('styles')
