<!DOCTYPE html>
<html lang="en-US" class="no-js">


<!-- Mirrored from globalflowshipment.com/track/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2024 08:20:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <title>Track - Global Flow Shipment Transportation & Logistics</title>

    <!--  FAVICON  -->
    <link rel="shortcut icon" href="page/assets/images/icons/favicon.png">

    <!-- FONT AWESOME ICONS LIBRARY -->
    <link rel="stylesheet" href="page/assets/fonts/css/all.min.css">

    <!-- CSS LIBRARY STYLES -->
    <link rel="stylesheet" href="page/assets/css/lib/bootstrap.min.css">
    <link rel='stylesheet' href="page/assets/css/lib/flickity.min.css">
    <link rel='stylesheet' href="page/assets/css/lib/magnific-popup.min.css">
    <link rel="stylesheet" href="page/assets/css/lib/owl.carousel.min.css">
    <link rel="stylesheet" href="page/assets/css/lib/slick.min.css">
    <link rel="stylesheet" href="page/assets/css/lib/aos.min.css">
    <link rel="stylesheet" href="page/assets/css/navbar.css">

    <!-- CSS TEMPLATE STYLES -->
    <link rel="stylesheet" href="page/assets/css/main.css">
    <link rel="stylesheet" href="page/assets/css/stylesheet.css">
    <link rel="stylesheet" href="page/assets/css/responsive.css">

    <!-- MODERNIZR LIBRARY -->
    <script src="page/assets/js/modernizr-custom.js"></script>
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '3cbca979a8d1f124ead89a64cdbf6691d4f64ea0';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

</head>

<body>

    <!-- PRELOADER START -->
    <div id="loader-wrapper">
        <div class="loader" id="cube"></div>
    </div>
    <!-- PRELOADER END -->

    <header>
        <!-- TOP HEADER START -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="top-contact">
                            <li class="phone"><a href="https://wa.me/1803402374">+1 (803) 402-3742</a></li>
                            <li><a class="btn btn-default" href="index.html" role="button">Start Tracking</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- TOP HEADER END -->

        <!-- NAV START -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="{{url('/')}}" class="navbar-brand"><img src="assets/images/logos/logo.html" alt=""></a>

                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                </button>

                <div id="main-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="dropdown">
                            <a href="{{url('/')}}" class="nav-item nav-link active">HOME</a>
                        </li>

                        <li class="dropdown">
                            <a href="{{url('/track')}}" class="nav-item nav-link">Track Parcel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAV END -->

        <!-- PAGE NAV START -->
        <div class="pages-hero">
            <div class="container">
                <div class="pages-title">
                    <h1>Track Parcel</h1>
                    <div class="page-nav">
                        <p>Home &nbsp; | &nbsp; Track</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE NAV END -->
    </header>

    <!-- CONTENT START -->
    <section>
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <b>Error!</b>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('status'))
        <div class="alert alert-success" role="alert">
            <b>Success!</b> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session('message'))
        <div class="alert alert-success" role="alert">
            <b>Success!</b> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- ABOUT COMPANY START -->
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h5>Track Parcel</h5>
                        <h2>Quick and easy</h2>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-12">
                            <form action="{{ route('package')}}" class="cg__contactForm row" method="POST">
                                @csrf
                                <div class="col-sm-12 col-md-12 py-3">
                                    <div class="cg__form-component">
                                        <input class="form-control" type="text" name="search"
                                            placeholder="Enter tracking ID" required>
                                    </div>
                                    <!--/.cg__form-component-->
                                    <input type="submit" name="btn_track1" class="btn btn-primary mt-2"
                                        value="TRACK IT">

                                </div>
                                <!--/.col-sm-6-->
                            </form>


                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <b>Error!</b>{{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif (session('status'))
                            <div class="alert alert-success" role="alert">
                                <b>Success!</b> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif (session('message'))
                            <div class="alert alert-success" role="alert">
                                <b>Success!</b> {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mt-3">
                        <div id="track_content">
                            <img src="page/assets/images/landing/air-freight-courier-service-500x500.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT COMPANY END -->

        <!-- ABOUT WIDE SECTION START -->
        <div class="ws-about">
            <div class="row no-gutters">
                <div class="col-lg-10 col-xl-5">
                    <div class="wsa-left">

                    </div>
                </div>
                <div class="col-lg-2 col-xl-2">
                    <div class="wsa-center">
                        <div class="wsa-center-content">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-lg-12">
                                    <div class="counter-box">
                                        <div class="counter-caption">
                                            <figure class="counter-icon">
                                                <img src="page/assets/images/icons/airplane-around-earth.png" alt="">
                                            </figure>
                                            <div class="counter" data-count="98">0</div>
                                            <p>Countries Covered</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-12">
                                    <div class="counter-box">
                                        <div class="counter-caption">
                                            <figure class="counter-icon">
                                                <img src="page/assets/images/icons/delivery.png" alt="">
                                            </figure>
                                            <div class="counter" data-count="5432">0</div>
                                            <p>Packages Received</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 col-lg-12">
                                    <div class="counter-box">
                                        <div class="counter-caption">
                                            <figure class="counter-icon">
                                                <img src="page/assets/images/icons/building.png" alt="">
                                            </figure>
                                            <div class="counter" data-count="1432">0</div>
                                            <p>National Offices</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-5">
                    <div class="wsa-right">
                        <div class="wsa-content">
                            <h2>The New Logistic Revolutions</h2>
                            <p>World’s leading non-asset based supply chain management
                                companies, we design and implement industry-leading.</p>
                            <p>Global Flow Shipment has met the demands of a growing world. Our qualified human team
                                guarantees
                                you
                                an essential experience
                                and professionalism, with a personalized treatment
                                to solve any of your needs.</p>
                            <figure class="signature">
                                <img src="page/assets/images/commons/signature-white.png" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT WIDE SECTION END -->




    </section>
    <!-- CONTENT END -->

    <!-- FOOTER START -->
    <footer>
        <div class="container">
            <div class="top-footer">
                <div class="row">
                    <!--
                    <div class="col-md-4">
                        <div class="footer-contact-col">
                            <div class="fc-circle">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="fc-caption">
                                <h5><a href="tel:058-123-456-7890"> (+58) 123-456-7890</a></h5>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="col-md-6 spacing-sm-center">
                        <div class="footer-contact-col">
                            <div class="fc-circle">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="fc-caption">
                                <h5><a href="support@globalflowshipment.com">support@globalflowshipment.com</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-contact-col">
                            <div class="fc-circle">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="fc-caption">
                                <h5>33195 NW 56th ST Miami, Florida</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
        </div>
        <div class="container mt-5">
            <p class="footer-bootom">Copyright © 2021 Global Flow Shipment Transportation & Logistics</p>
        </div>
    </footer>
    <!-- FOOTER END -->

    <!--SCROLL TOP START-->
    <a href="#0" class="cd-top">Top</a>
    <!--SCROLL TOP START-->

    <!-- JAVASCRIPTS -->
    <script data-cfasync="false" src="page/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="page/assets/js/lib/jquery-3.6.0.min.js"></script>
    <script src="page/assets/js/lib/bootstrap.min.js"></script>
    <script src="page/assets/js/lib/plugins.js"></script>
    <script src="page/assets/js/lib/nav.fixed.top.js"></script>
    <script src="page/assets/js/main.js"></script>
    <script src="page/js/user/trackjs.js"></script>
    <!-- JAVASCRIPTS END -->
    <script type="text/javascript">
        window.$crisp=[];window.CRISP_WEBSITE_ID="f705f88e-91eb-41a9-81d3-c7cbd9c6f953";(function(){d=document;s=d.createElement("script");s.src="page/../client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
    </script>
</body>


<!-- Mirrored from globalflowshipment.com/track/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2024 08:20:35 GMT -->

</html>