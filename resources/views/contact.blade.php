@extends("partials.includes")

@section("style_supplementaire")
    <style>
        .page-top{
            background: url("template/images/bg-contact.jpg");
        }

        .page-top-overlay{
            content: "";
            background-color: #1a202caa;
        }
        .page-top-in > h2 > span{
            background: #d84949;
            color: #fff;
        }

        .pgl-bg-light{
            padding: 5px;
        }
        .contact{
            padding: 15px;
        }

        .big-icon{
            font-size: 90px;
        }
        a{
            color: #1a202c;
            text-decoration: none !important;
        }
        .offer-item:hover a{
            color: #fff;
        }
    </style>
@endsection

@section("contenu")
    <!-- Begin Main -->
    <div role="main" class="main pgl-bg-grey">
        <!-- Begin page top -->
        <section class="page-top">
            <div class="page-top-overlay">
                <div class="container">
                <div class="page-top-in">
                    <h2><span>Contactez Nous</span></h2>
                </div>
                </div>


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">

                            <!-- Begin About -->
                                    <div class="row">
                                        <div class="col-md-6 animation">
                                            <div class="offer-item pgl-bg-light">
                                                <div class="offer-item-inner">
                                                    <p><i class="fa fa-home big-icon"></i></p>
                                                    {{--                                    <p><i class="icons icon-home"></i></p>--}}
                                                    <h3>Passez a notre siege</h3>
                                                    <p>01 BP 11681 ABIDJAN 01 – ANGRE STAR 7 VILLA 17</p>
                                                    <a href="#carte-sur-map"> je ne sais pas ou c'est </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 animation">
                                            <div class="offer-item pgl-bg-light">
                                                <div class="offer-item-inner">
                                                    <p><i class="fa fa-phone big-icon"></i></p>
                                                    <h3>Appelez Nous</h3>
                                                    <span> 27 22 42 85 12</span>
                                                    <br/>
                                                    <span> 07 48 11 28</span>
                                                    <br/>
                                                    <span> 07 77 88 05 92</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 animation">
                                            <div class="offer-item pgl-bg-light">
                                                <div class="offer-item-inner">
                                                    <p><i class="fa fa-envelope big-icon"></i></p>
                                                    <h3>Ecrivez Nous</h3>

                                                    <span> <a href="mailto:Kangaimmobilier059@gmail.com"> Kangaimmobilier059@gmail.com </a></span>
                                                    <br/>
                                                    <br/>
                                                    <span> <a href="mailto:arthuro.konanfranck77@gmail.com"> arthuro.konanfranck77@gmail.com </a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <!-- End About -->
                        </div>
                        <div class="col-md-4">
                            <form method="POST" action="{{route('demmande_rdv')}}" class=" pgl-bg-light" style="margin-bottom: 50px" >
                                <h3 class="text-center"><b><u>Demander un rendez-vous</u></b> </h3>
                                {!! Session::get('notification','') !!}
                                <div class="form-group">
                                    <label>Nom complet</label>
                                    <input required class="form-control" name="nom_complet" />
                                </div>
                                <div class="form-group">
                                    <label>Objet</label>
                                    <input required type="objet" class="form-control" name="objet" />
                                </div>
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input required type="tel" class="form-control" name="telephone" />
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input required type="adresse" class="form-control" name="adresse" />
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input required type="date" min="<?=date('Y-m-d')?>" class="form-control" name="date" />
                                </div>
                                <div class="form-group">
                                    <label>Heure</label>
                                    <input required type="time" class="form-control" name="heure" />
                                </div>
                                <div class="form-group text-center">
                                    @csrf
                                    <input required type="submit" class="btn btn-success" value="Demander un rendez vous" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End page top -->

        <section class="container-fluid" id="carte-sur-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254236.50960184808!2d-4.119754552627271!3d5.348776067157558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ea5311959121%3A0x3fe70ddce19221a6!2sAbidjan!5e0!3m2!1sfr!2sci!4v1616869129657!5m2!1sfr!2sci" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
        <!-- End content with sidebar -->

    </div>
    <!-- End Main -->


@endsection
