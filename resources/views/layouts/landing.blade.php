<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>SIPRAKTIF - Sistem Informasi Penanganan Penghentian Penuntutan Berdasarkan Keadilan Restoratif
    </title>
    <meta name="description" content="Sistem Informasi Penanganan Penghentian Penuntutan Berdasarkan Keadilan Restoratif
    " />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="Replace_with_your_PAGE_URL" />

    <!-- Stylesheets -->
    <link href="{{ asset('assets-landing/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-landing/css/responsive.css') }}" rel="stylesheet">


    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="SIPRAKTIF - Sistem Informasi Penanganan Penghentian Penuntutan Berdasarkan Keadilan Restoratif" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="SITE_NAME" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Sistem Informasi Penanganan Penghentian Penuntutan Berdasarkan Keadilan Restoratif
    " />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;500;600;700;900&family=Libre+Baskerville:wght@400;700&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&family=Sacramento&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">


    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-landing/images/SI PRAKTIF (1).png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets-landing/images/SI PRAKTIF (1).png') }}" type="image/x-icon">
    <meta name="msapplication-TileImage" content="{{ asset('assets-landing/images/SI PRAKTIF (1).png') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/css/jquery.dataTables.min.css">


    <!-- Structured Data  -->
    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "Replace_with_your_site_title",
  "url": "Replace_with_your_site_URL"
}
</script>
</head>

<body>

    <div class="page-wrapper">
        <!-- Main Header-->
        <header class="main-header">
    	
            <!-- Header Top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <!-- Top Left -->
                        <div class="top-left">
                            <!-- Info List -->
                            <ul class="info-list">
                                <li><a href="mailto:kt.bengkulu@kejaksaan.go.id"><span class="icon icofont-envelope"></span> kt.bengkulu@kejaksaan.go.id</a></li>
                                <li><a href="tel:07367345695"><span class="icon icofont-phone"></span> (0736) 7345695</a></li>
                            </ul>
                        </div>
                        
                        <!-- Top Right -->
                        <div class="top-right pull-right">
                            <!-- Social Box -->
                            <ul class="social-box">
                                <li class="share">Our Social</li>
                                <li><a href="https://twitter.com/" class="icofont-twitter"></a></li>
                                <li><a href="http://facebook.com/" class="icofont-facebook"></a></li>
                                <li><a href="https://www.instagram.com/" class="icofont-instagram"></a></li>
                                <li><a href="https://www.youtube.com/" class="icofont-play-alt-1"></a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        
                        <div class="pull-left logo-box">
                            <div class="logo"><a href="{{ route('index') }}"><img src="{{ asset('assets-landing/images/logo.png') }}" alt="" title=""></a></div>
                        </div>
                        
                           <div class="nav-outer pull-left clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
    
                                <div class="navbar-collapse show collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="{{ route('index') }}">Home</a></li>
                                        <li class="dropdown"><a href="#">Monitoring Perkara</a>
                                            <ul>
                                                @foreach ($divisi as $data)
                                                    <li><a
                                                            href="{{ Route('dataPerkara', ['id' => $data->id]) }}">Satuan Kerja {{ $data->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('tentangRj') }}">Restorative Justice</a></li>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    </ul>
                                </div>
                                
                            </nav>
                            
                        </div>
                        
                        <!-- Outer Box -->
                        <div class="outer-box">
                            <!-- Search Btn -->
                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon ti-menu"></span></div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
            
            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon lnr lnr-cross"></span></div>
                
                <nav class="menu-box">
                    <div class="nav-logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
                    <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                </nav>
            </div><!-- End Mobile Menu -->
            
        </header>
        <!--End Main Header -->

        @yield('content')
        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!-- Column -->
                        <div class="big-column col-lg-6 col-md-12 col-sm-6 col-12">
                            <div class="row clearfix">

                                <!-- Footer Column -->
                                <div class="footer-column col-lg-12 col-md-12 col-sm-12">
                                    <div class="contact-map-area">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.056523362744!2d102.26470187601497!3d-3.7978444435314938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b017e4245713%3A0x9760bb3b8083bf55!2sJl.%20S.%20Parman%20Kejaksaan%20Tinggi%20No.2%2C%20Tanah%20Patah%2C%20Kec.%20Ratu%20Agung%2C%20Kota%20Bengkulu%2C%20Bengkulu%2038222!5e0!3m2!1sid!2sid!4v1718932098571!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Column -->
                        <div class="big-column col-lg-6 col-md-12 col-sm-6 col-12">
                            <div class="row clearfix">

                                <!-- Footer Column -->
                                

                                <!-- Footer Column -->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget newsletter-widget">
                                        <h5>Informasi Kontak</h5>
                                        <div class="row" style="margin: 10px 0px">
                                            <div class="col-3 d-flex justify-content-center">
                                                <a href=""><i class="bi bi-twitter" style="font-size: 24px"></i></a>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center">
                                                <a href=""><i class="bi bi-facebook" style="font-size: 24px"></i></a>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center">
                                                <a href=""><i class="bi bi-instagram" style="font-size: 24px"></i></a>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center">
                                                <a href=""><i class="bi bi-youtube" style="font-size: 24px"></i></a>
                                            </div>
                                            <div class="row mt-5">
                                                <ul class="list-link">
                                                    <li><a href="https://maps.app.goo.gl/7F5JgjfyWHKh8qgW9" target="_blank"> <i class="bi bi-pin-map-fill" style="font-size: 24px"></i> Jl. S. Parman Kejaksaan Tinggi No.2, Tanah Patah, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222</a></li>
                                                    <li><a href="tel:07367345695"><i class="bi bi-telephone" style="font-size: 24px"></i> (0736) 7345695</a></li>
                                                    <li><a href="mailto:kt.bengkulu@kejaksaan.go.id"><i class="bi bi-envelope" style="font-size: 24px"></i> kt.bengkulu@kejaksaan.go.id</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Newsletter Form -->
                                    </div>
                                </div>

                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <h5>Quick Links</h5>
                                        <ul class="list-link">
                                            <li><a href="">Kejari Bengkulu</a></li>
                                            <li><a href="">Kejari Bengkulu Tengah</a></li>
                                            <li><a href="">Kejari Muko Muko</a></li>
                                            <li><a href="">Kejari Rejang Lebong</a></li>
                                            <li><a href="">Kejari Kepahiyang</a></li>
                                            <li><a href="">Kejari Lebong</a></li>
                                            <li><a href="">Kejari Seluma</a></li>
                                            <li><a href="">Kejari Bengkulu Selatan</a></li>
                                            <li><a href="">Kejari Kaur</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="auto-container">
                        <div class="bottom-inner">
                            <div class="row clearfix">

                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="copyright">Copyright ©
                                        <script async="" src="https://www.google-analytics.com/analytics.js"></script>
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> Kejaksaan Tinggi Bengkulu </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <ul class="social-nav">
                                        <li><a href="https://twitter.com/" class="icofont-twitter"></a></li>
                                        <li><a href="http://facebook.com/" class="icofont-facebook"></a></li>
                                        <li><a href="https://www.instagram.com/" class="icofont-instagram"></a></li>
                                        <li><a href="https://rss.com/" class="icofont-rss"></a></li>
                                        <li><a href="https://www.youtube.com/" class="icofont-play-alt-1"></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </footer>

    </div>
    <!--End pagewrapper-->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

    <script src="{{ asset('assets-landing/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>

    <script src="{{ asset('assets-landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets-landing/js/appear.js') }}"></script>
    <script src="{{ asset('assets-landing/js/owl.js') }}"></script>
    <script src="{{ asset('assets-landing/js/wow.js') }}"></script>
    <script src="{{ asset('assets-landing/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets-landing/js/script.js') }}"></script>

    {{-- Cdn Data Table --}}
    <script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>



</body>

</html>
