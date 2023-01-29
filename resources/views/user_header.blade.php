@php
    
    if (isset($title)) {
        $title = $title;
    } else {
        $title = 'BIGGIFT - Leading Corporate Gifting Company in India';
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.svg">


    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('user/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/main.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <title>{{$title}}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->


    <main class="main-content  ">

        <header data-anim="fade" data-add-bg="" class="header -type-4 -shadow bg-white border-bottom-light js-header">


            <div class="header__container py-10">
                <div class="row justify-between items-center">

                    <div class="col-auto">
                        <div class="header-left d-flex items-center">

                            <div class="header__logo pr-30 xl:pr-20 md:pr-0">
                                <a data-barba href="index.html">
                                    <img src="{{ asset('user/img/logo.svg')}}" alt="logo">
                                </a>
                            </div>
                            <div class="header-menu js-mobile-menu-toggle pl-30 xl:pl-20">
                                <div class="header-menu__content">
                                    <div class="mobile-bg js-mobile-bg"></div>

                                    <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                                        <a href="login.html" class="text-dark-1">Log in</a>
                                        <a href="signup.html" class="text-dark-1 ml-30">Sign Up</a>
                                    </div>

                                    <div class="menu js-navList">
                                        <ul class="menu__nav text-dark-1 -is-active">
                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">BIGG Theme &nbsp;<i
                                                        class="fa fa-chevron-down"></i></a>

                                                <ul class="subnav">
                                                    <li class="menu__backButton js-nav-list-back">
                                                        <a href="#"><i class="fa fa-arrow-left"></i>&nbsp; BIGG
                                                            Theme</a>
                                                    </li>

                                                    <li><a href="{{ route('corporate.biggift') }}">Corporate BIGGIFT</a></li>

                                                    <li><a href="home-2.html">BIGG Home Delivery</a></li>

                                                    <li><a href="home-3.html">Joinee BIGG KIT</a></li>

                                                    <li><a href="home-4.html">BIGG Vouchers</a></li>

                                                    <li><a href="home-5.html">BIGG Brandstore</a></li>

                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">Resources &nbsp;<i
                                                        class="fa fa-chevron-down"></i></a>
                                                <ul class="subnav">

                                                    <li class="menu__backButton js-nav-list-back">
                                                        <a href="#"><i class="fa fa-arrow-left"></i>&nbsp;
                                                            Resources</a>
                                                    </li>

                                                    <li><a href="event-list-1.html">Blog</a></li>

                                                    <li><a href="event-list-2.html">Case Studies</a></li>

                                                    <li><a href="event-single.html">Download</a></li>

                                                </ul>
                                            </li>

                                            <li>
                                                <a data-barba href="about-us.html">About</a>
                                            </li>

                                            <li>
                                                <a data-barba href="contact-us.html">Contact</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                                        <div class="mobile-footer__number">
                                            <div class="text-17 fw-500 text-dark-1">Call us</div>
                                            <div class="text-17 fw-500 text-purple-1">+91 12345 67890</div>
                                        </div>

                                        <div class="lh-2 mt-10">
                                            <div>Lakkasandra, Lakkasandra Extension, Wilson Garden, Bengaluru - 560 027
                                            </div>
                                            <div>info@multimarketing.in</div>
                                        </div>

                                        <div class="mobile-socials mt-10">

                                            <a href="#"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <i class="fa-brands fa-facebook"></i>
                                            </a>

                                            <a href="#"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>

                                            <a href="#"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>

                                            <a href="#"
                                                class="d-flex items-center justify-center rounded-full size-40">
                                                <i class="fa-brands fa-youtube"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                                    <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                                        <div class="text-dark-1 text-16"> <i class="fa fa-xmark"></i></div>
                                    </div>
                                </div>

                                <div class="header-menu-bg"></div>
                            </div>

                        </div>
                    </div>


                    <div class="col-auto">
                        <div class="header-right d-flex items-center">
                            <div class="header-right__icons text-white d-flex items-center">

                                <div class="pr-20 sm:pr-15">
                                    <button class="d-flex items-center text-dark-1"
                                        data-el-toggle=".js-search-toggle">
                                        <i class="fa fa-magnifying-glass"></i>
                                    </button>

                                    <div class="toggle-element js-search-toggle">
                                        <div class="header-search pt-90 bg-white shadow-4">
                                            <div class="container">
                                                <div class="header-search__field">
                                                    <div class="icon text-dark-1"><i
                                                            class="fa fa-magnifying-glass"></i></div>
                                                    <input type="text"
                                                        class="col-12 text-18 lh-12 text-dark-1 fw-500"
                                                        placeholder="What do you want to learn?">

                                                    <button
                                                        class="d-flex items-center justify-center size-40 rounded-full bg-purple-3"
                                                        data-el-toggle=".js-search-toggle">
                                                        <img src="{{ asset('user/img/close.svg') }}" alt="icon">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header-search__bg" data-el-toggle=".js-search-toggle"></div>
                                    </div>
                                </div>
                                <div class="d-none xl:d-block -before-border pl-20 sm:pl-15">
                                    <button class="text-dark-1 items-center" data-el-toggle=".js-mobile-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="header-right__buttons d-flex items-center lg:d-none">
                                <a href="#"
                                    class="button -underline text-dark-1 -before-border py-3 pl-30 xl:pl-20">Log in</a>
                                <a href="#"
                                    class="button h-50 px-25 -purple-3 -rounded text-purple-1 ml-20">Sign up</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <div class="content-wrapper  js-content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <footer class="footer -type-5 pt-60" style="background-color:#efefef;">
                <div class="container">
                    <div class="row y-gap-30 pb-60">
                        <div class="col-xl-3 col-lg-5 col-md-6">
                            <div class="footer-header__logo">
                                <img src="{{ asset('user/img/logo.svg') }}" alt="logo">
                            </div>

                            <div class="mt-30">
                                <div class="text-17 text-dark-1">Call Us</div>
                                <div class="text-17 lh-1 fw-500 text-purple-1 mt-5">+91 98866 46203</div>
                            </div>

                            <div class="mt-30 pr-20">
                                <div class="lh-17">#257/1, 13th Cross, Above Apex Bank, Wilson Garden, Bengaluru,
                                    <br />Karnataka, INDIA 560 027
                                </div>
                            </div>

                            <div class="footer-header-socials mt-30">
                                <div class="footer-header-socials__list d-flex items-center">
                                    <a href="#" class="size-40 d-flex justify-center items-center"><i
                                            class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="size-40 d-flex justify-center items-center"><i
                                            class="fa-brands fa-instagram"></i></a>
                                    <a href="#" class="size-40 d-flex justify-center items-center"><i
                                            class="fa-brands fa-linkedin"></i></a>
                                    <a href="#" class="size-40 d-flex justify-center items-center"><i
                                            class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="text-17 fw-600 text-dark-1 mb-25">Quick Links</div>
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="about-1.html">Corporate BIGGIFT</a>
                                <a href="blog-list-1.html">BIGG Home Delivery</a>
                                <a href="instructor-become.html">Joinee BIGG KIT</a>
                                <a href="blog-list-1.html">BIGG Vouchers</a>
                                <a href="#">BIGG Brandstore</a>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-4">
                            <div class="text-17 fw-600 text-dark-1 mb-25">Company</div>
                            <div class="row justify-between y-gap-20">
                                <div class="col-lg-auto col-md-6">
                                    <div class="d-flex y-gap-10 flex-column">
                                        <a href="courses-single-1.html">About</a>
                                        <a href="courses-single-2.html">FAQ's</a>
                                        <a href="courses-single-3.html">Support</a>
                                        <a href="courses-single-4.html">Blog</a>
                                        <a href="courses-single-5.html">Case Studies</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 offset-xl-1 col-lg-4 col-md-6">
                            <div class="text-17 fw-600 text-black mb-25">
                                Newsletter
                            </div>
                            <form action="post" class="form-single-field -base mt-15">
                                <input class="py-20 px-30 bg-dark-6 rounded-200 text-white" type="text"
                                    placeholder="Your email address">
                                <button class="button -white rounded-full" type="submit">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </form>
                            <br />
                            <p>Get all the latest products news.<br />
                                Sign up for BIGGIFT today!</p>
                        </div>

                    </div>

                    <div class="py-30 border-top-light">
                        <div class="row justify-between items-center y-gap-20">
                            <div class="col-auto">
                                <div class="footer-footer__copyright d-flex items-center h-100">
                                    © 2023 BIGGIFT. All Rights Reserved.
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                                    <div>
                                        <a href="http://www.webmillet.com" target="_blank"
                                            class="-md -light-4 px-20">
                                            Crafted by Webmillet
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="{{ asset('user/js/vendors.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
