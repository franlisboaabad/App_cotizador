<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="IDEASSOFT PERÚ">
    {{-- <link rel="icon" href="{{ asset('/page/images/monacheco/logo-monacheco') }}">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('/page/images/monacheco/logo-monacheco.ico') }}" /> --}}

    

    <!-- Page Title -->
    <title> @yield('title') - Cotizador en línea.</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <!-- Icon fonts -->
    <link href="{{ asset('page/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('page/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('page/css/style.css') }}" rel="stylesheet">
</head>

<body>



    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="inner">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header class="site-header header-style-2">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col col-sm-5">
                            <div class="contact-info">
                                <ul>
                                    <li><i class="fa fa-envelope"></i> <a href="#!" style="color:white">informes@monachecotours.com</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-sm-7">
                            <div class="social-contact-info-right">
                                <div class="social">
                                    <ul>
                                        <li><a href="https://www.facebook.com/Monachecotours" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#!" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://www.youtube.com/ " target="_blank"><i class="fa fa-youtube-square"></i></a></li>
                                        
                                    </ul>
                                </div>
                                <div class="contact-info-right">
                                    <ul>
                                        <li><span>PE:</span> +51 919023541</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <!-- end topbar -->

            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img
                                src="{{ asset('page/images/monacheco/logo_monacheco.png') }}"
                                style="width: 90px; height: auto; margin-top: -20px;" alt="logo-monachecotours"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                        <button class="close-navbar"><i class="fa fa-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li><a href="/">INICIO</a></li>
                            <li><a href="{{ route('nosotros') }}">NOSOTROS</a></li>
                            <li><a href="{{ route('paquetes_turisticos') }}">PAQUETES TURÍSTICOS</a></li>
                            {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PAQUETES TURISTICOS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#!">Locales</a></li>
                                    <li><a href="#">Nacionales</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="{{ route('servicios_turismo') }}">SERVICIOS</a></li>
                            <li><a href="{{ route('portafolio') }}">GALERÍA</a></li>
                            {{-- <li><a href="{{ route('blog') }}">BLOG</a></li> --}}
                            <li><a href="{{ route('contacto') }}">CONTACTO</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->

                    <div class="header-search-area">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                        <div class="header-search-form">
                            <form class="form">
                                <div>
                                    <input type="text" class="form-control" placeholder="Search here">
                                </div>
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->

        <div class="main">
            @yield('contenido')
        </div>




        <!-- start site-footer -->
        <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-4 col-sm-6" style="margin-bottom:30px">
                            <h4 style="color:white">MONACHECO TOURS</h3>
                                <div class="">
                                    <p class="text-justify">Agencia de Viajes y Tour Operadora en la ciudad de Piura -
                                        Perú, ofrecemos servicios personalizados para vivir la mejor experiencia en
                                        viajes y turismo.</p>
                                </div>
                        </div>

                        <div class="col-md-4 col-sm-6 medios-pago" style="margin-bottom:30px; text-align: center">
                            <h4 style="color:white;">MEDIOS DE PAGO</h3>
                                <div class="">
                                    <p>Aceptamos todas las tarjetas de crédito y débito, Transferencias, Yape.</p>
                                    <img src="{{ asset('/page/images/ideaspiuratours/agencia-de-viajes-pagos.png') }}"
                                        class="img-fluid">
                                </div>
                        </div>


                        <div class="col-md-4 col-sm-6" style="margin-bottom:30px">
                            <h4 style="color:white">CONTÁCTANOS</h3>
                                <div class="">
                                    <p>
                                        <i class="fa fa-map-marker"></i> JR. La esperanza 112- Centro de Canchaque - Huancabamba.<br>
                                        <i class="fa fa-cube"></i>  informes@monachecotours.com <br>
                                        <i class="fa fa-phone"></i> +51 919 023 541 <br>
                                        
                                        <a href="{{ asset('/page/files/formato_libro_reclamaciones.pdf') }}" target="_blank" style="color:white"> <i class="fa fa-file"></i> Libro de reclamaciones </a>
                                    </p>
                                </div>
                        </div>


                    </div>
                </div>
            </div> <!-- end upper-footer -->


            <div class="copyright-info">
                <div class="container">
                    <p> © Copyright 2022 - <a href="https://www.facebook.com/monachecotours" target="_blank">IDEAS
                            PIURATOURS - Agencia de viajes y turismo.</a></p>
                    <ul>
                        <li><a href="https://www.facebook.com/ideassoftperu/" target="_blank">Desarrollado por IDEASSOFT
                                PERÚ</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->

        <div style="position:fixed;z-index:900;bottom:90px;right:14px">
            <div style="width:70px;height:70px;float:left;overflow:hidden">
                <a href="https://wa.me/51919023541" target="_blank"><img src="{{ asset('page/images/wpp.png') }}"
                        class="img-fluid"></a>
            </div>
        </div>





    </div>
    <!-- end of page-wrapper -->






    <!-- All JavaScript files
    ================================================== -->
    {{-- <script src="{{ asset('page/js/jquery.min.js') }} "></script>
    <script src="{{ asset('page/js/bootstrap.min.js') }} "></script> --}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="{{ asset('page/js/jquery-plugin-collection.js') }}"></script>

    <!-- Custom script for this template -->
    <script src="{{ asset('page/js/script.js') }} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js.map"></script> --}}

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>

    @yield('js')

</body>

</html>
