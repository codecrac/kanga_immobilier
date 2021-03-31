<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from pixelgeeklab.com/html/realestast/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 17:05:12 GMT -->

<!--///HUMAN///-->
<!------------------------------------------------------------>
<!--dev : yves ladde-->
<!--cv perso = https://ladde.000webhostapp.com/cv-->
<!------------------------------------------------------------>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Flatize - Shop HTML5 Responsive Template">
    <meta name="author" content="pixelgeeklab.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RealEstast - HTML5 Template</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link href="{{asset('template/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libs CSS -->
    <link href="{{asset('template/css/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/vendor/owl-carousel/owl.carousel.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('template/vendor/owl-carousel/owl.theme.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('template/vendor/flexslider/flexslider.css')}}" media="screen">
    <link rel="stylesheet" href="{{asset('template/vendor/chosen/chosen.css')}}" media="screen">

    <!-- Theme -->
    <link href="{{asset('template/css/theme-animate.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/theme-elements.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/theme-blog.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/theme-map.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/theme.css')}}" rel="stylesheet">

    <!-- Style Switcher-->
    <link rel="stylesheet" href="{{asset('template/style-switcher/css/style-switcher.css')}}">
    <link href="{{asset('template/css/colors/red/style.html')}}'" rel="stylesheet" id="layoutstyle">

    <!-- Theme Responsive-->
    <link href="{{asset('template/css/theme-responsive.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield("style_supplementaire")
    <style>
        /*effacer la barre de google*/
        .skiptranslate{
            /*display: none;*/
        }
        body{
            /*top: 0px !important;*/
        }
    </style>
</head>
<body>
<div id="page">
    <header>
        <div id="top">
            <div class="container">
                <p class="pull-left text-note hidden-xs"><i class="fa fa-phone"></i> Service client? 27 22 42 85 12 / 07 48 11 28 / 07 77 88 05 92</p>
                <ul class="nav nav-pills nav-top navbar-right">

                    <li><a href="template/#" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Email"><i class="fa fa-envelope-o"></i></a></li>
                    <li><a href="template/#" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="template/#" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li class="login"><a href="{{route('login')}}"><i class="fa fa-user"></i></a></li>
{{--                    <li><a href="template/#" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>--}}
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-default pgl-navbar-main" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="logo" href="template/index.html"><img src="{{asset('template/images/logo.png')}}" alt="Flatize"></a> </div>

                <div class="navbar-collapse collapse width">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown" id="home"><a href="{{route("home")}}">Accueil</a></li>

                        <li class="dropdown" id="about"><a href="{{route("about")}}" class="dropdown-toggle" data-toggle="dropdown">QUI SOMMES NOUS</a></li>

                        <li class="dropdown" id="properties"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Proprietes</a>
                            <ul class="dropdown-menu">
                                @foreach($liste_categorie as $item_categorie)
                                    <li><a href="{{route('properties',[$item_categorie])}}">{{$item_categorie->nom}}</a></li>
                                @endforeach
                                {{--<li><a href="{{route('properties',['a-vendre'])}}">A vendre</a></li>
                                <li><a href="{{route('properties',['a-louer'])}}">A Louer</a></li>
                                <li><a href="{{route('properties',['terrains'])}}">Terrains</a></li>--}}
                            </ul>
                        </li>
                        <li id="contact">
                            <a href="{{route("contact")}}" >Nous joindre</a>
                        </li>
                        <li id="contact">
                            <a href="{{route('redirection',['fr'])}}" >
                                <img src="https://cdn.pixabay.com/photo/2012/04/11/15/19/france-28463_960_720.png" width="30px">
                            </a>
                        </li>
                        <li id="contact">
                            <a href="{{route('redirection',['en'])}}" >
                                <img src="https://cdn.pixabay.com/photo/2015/11/06/13/29/union-jack-1027898_960_720.jpg" width="30px">
                            </a>
                        </li>
                        <li id="contact">
                            <a href="{{route('redirection',['it'])}}" >
                                <img src="https://cdn.pixabay.com/photo/2012/04/11/15/35/flag-28543_960_720.png" width="30px">
                            </a>
                        </li>
                        <li id="contact">
                            <a href="{{route('redirection',['de'])}}">
                                <img src="https://cdn.pixabay.com/photo/2012/04/12/23/52/germany-31017_960_720.png" width="30px">
                            </a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </header>


            @yield("contenu")

    <!-- Begin footer -->
    <footer class="pgl-footer">
        <div class="container">
            <div class="pgl-upper-foot">
                <div class="row">

                    <div class="col-sm-4">
                        <h2>A propos</h2>
                        <p><b>KANGA IMMOBILIER</b> est une Société à Responsabilité Limitée créée pour répondre à un besoin exprimé par un marché ivoirien en pleine mutation : celui d’offrir aux entreprises et aux particuliers des solutions sur mesure adaptés à leurs besoins</p>
                    </div>
                    <div class="col-sm-4">
                        <h2>Nous joindre</h2>
{{--                        <p>Pellentesque nec erat. Aenean semper, neque non faucis. Malesuada, dui felis tempor felis, vel varius ante diam ut mauris.</p>--}}
                        <address>
                            <i class="fa fa-map-marker"></i> Adresse : 01 BP 11681 ABIDJAN 01 – ANGRE STAR 7 VILLA 17<br>
                            <i class="fa fa-phone"></i> 27 22 42 85 12 / 07 48 11 28 / 07 77 88 05 92<br>
{{--                            <i class="fa fa-phone"></i> 07 48 11 28<br>--}}
{{--                            <i class="fa fa-phone"></i> 07 77 88 05 92<br>--}}
{{--                            <i class="fa fa-fax"></i> Fax : 1-800-666-8888<br>--}}
                            <i class="fa fa-envelope-o"></i> <a href="mailto:Kangaimmobilier059@gmail.com">arthuro.konanfranck77@gmail.com</a><br>
                            <i class="fa fa-envelope-o"></i> <a href="mailto:arthuro.konanfranck77@gmail.com">Kangaimmobilier059@gmail.com</a>
                        </address>
                    </div>
                    <div class="col-sm-2">
                        <h2>Liens utiles</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route("home")}}">Accueil</a></li>
                            <li><a href="{{route("about")}}">Qui sommes nous</a></li>
                            <li><a href="#">Proprietes</a></li>
                            <li><a href="{{route("contact")}}">Nous joindre</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <h2>Resaux Sociaux</h2>
                        <ul class="list-unstyled">
                            <li><a href="template/#">Facebook</a></li>
                            <li><a href="template/#">Twitter</a></li>
                            <li><a href="template/#">Linkedin</a></li>
                            <li><a href="template/#">Instagram</a></li>
                            <li>
                                <div id="google_translate_element"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pgl-copyrights text-center">
                <p>Copyright © <?= date('Y');  ?> KANGA IMMOBILIER. <!--Designed by <a href="template/http://pixelgeeklab.com/">PixelGeekLab</a>--></p>
            </div>
        </div>
    </footer>
    <!-- End footer -->

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('template/vendor/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('template/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/vendor/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('template/vendor/flexslider/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('template/vendor/chosen/chosen.jquery.min.js')}}"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script src="{{asset('template/vendor/gmap/gmap3.infobox.min.js')}}"></script>

<!-- Theme Initializer -->
<script src="{{asset('template/js/theme.plugins.js')}}"></script>
<script src="{{asset('template/js/theme.js')}}"></script>

<!-- Style Switcher -->
<script type="text/javascript" src="{{asset('template/style-switcher/js/switcher.js')}}"></script>

{{--gestion de la route active--}}
<script>
    // var route_actuel = window.location.pathname;
    var route_actuel = window.location.href
    {{--alert("route actuelle = {{route('contact')}}");--}}
    // alert("route detectez = "+route_actuel);

    switch (route_actuel) {
        case "{{route('home')}}/" :document.getElementById("home").classList.add("active"); break;
        case "{{route('about')}}" :document.getElementById("about").classList.add("active"); break;
        case "{{route('contact')}}" :document.getElementById("contact").classList.add("active"); break;
        default : document.getElementById("properties").classList.add("active"); break;
    }

</script>

<!-- google translate script 1-->
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Call back function 2 -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'fr'
            , layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({
    //         pageLanguage: 'fr',
    //         includedLanguages: 'fr',
    //         autoDisplay: false
    //     }, 'google_translate_element');
    //     var a = document.querySelector("#google_translate_element select");
    //     a.selectedIndex=1;
    //     a.dispatchEvent(new Event('change'));
    // }
    function retour_en_francais() {
        alert('click');
        document.getElementById(":2.close").click();
    }
</script>

<!-- HTML element 3 -->
</body>

<!-- Mirrored from pixelgeeklab.com/html/realestast/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Mar 2021 17:06:44 GMT -->
</html>
