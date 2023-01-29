@extends('user_header')

@section('content')
    <section data-anim-wrap class="masthead -type-6">
        <div class="masthead__bg">
            <img src="img/corp-img-1.png" alt="blob">
            <img src="img/corp-img-2.png" alt="blob">
            <img src="img/corp-img-bg-1.png" alt="background">

            <div class="absolute-full-center" id="js-masthead-1-particles"></div>
        </div>

        <div class="container">
            <div class="row y-gap-50 items-center">
                <div class="col-lg-6">
                    <div class="masthead__content">
                        <!--  <div data-anim-child="slide-up delay-3" class="text-17 lh-15 text-purple-1 fw-500 mb-10">
                      Perfect Corporate Gift
                    </div> -->
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title">
                            Perfect Corporate Gift<br>
                            <span class="text-purple-1"> For Employees & Clients</span>
                        </h1>

                        <p data-anim-child="slide-up delay-4" class="mt-5">
                            4000+ innovative corporate gifts listed on our catalog.<br />
                            Find exactly what you're looking for, in 3 simple steps.
                        </p>
                        <br />
                        <div class="d-flex items-center" data-anim-child="slide-up delay-5">
                            <div class="about-content-list__icon">
                                <img src="img/check.png" alt="image">&nbsp;&nbsp;
                            </div>
                            <div class="about-content-list__title"> Use our Advanced Search feature to find exactly what you
                                need.</div>
                        </div>

                        <div class="d-flex items-center" data-anim-child="slide-up delay-5">
                            <div class="about-content-list__icon">
                                <img src="img/check.png" alt="image">&nbsp;&nbsp;
                            </div>
                            <div class="about-content-list__title"> Click Add to Catalog next to every product you like
                            </div>
                        </div>

                        <div class="d-flex items-center" data-anim-child="slide-up delay-5">
                            <div class="about-content-list__icon">
                                <img src="img/check.png" alt="image">&nbsp;&nbsp;
                            </div>
                            <div class="about-content-list__title"> Download only what you shortlisted into a professional
                                looking PDF.</div>
                        </div>

                        <div data-anim-child="slide-up delay-5" class="row items-center x-gap-20 y-gap-20 pt-20">
                            <div class="col-auto">
                                <a href="{{route('corporate.catalog')}}" class="button -icon -red-2 text-orange-1 mt-30">Go To BIGG Catalog
                                    &nbsp; <i class="fa fa-arrow-right"></i></a>
                            </div>
                            <div class="col-auto">
                                <a href="courses-list-1.html" class="button -icon -red-1 text-orange-2 mt-30">Watch Video
                                    &nbsp; <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div data-anim-child="slide-up delay-6" class="masthead__image relative">
                        <img src="img/random-shape.png" alt="image">
                        <div class="absolute-full-center d-flex justify-center items-center">
                            <a href="https://www.youtube.com/watch?v=ANYfx4-jyqY"
                                class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery"
                                data-gallery="gallery1">
                                <div class="icon-play text-18"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md border-bottom-light">
        <div class="container">
            <div class="row justify-center">
                <div class="col text-center">
                    <p class="text-lg text-dark-1">Trusted by the world’s best</p>
                </div>
            </div>

            <div class="row y-gap-30 justify-between sm:justify-start items-center pt-60 md:pt-50">

                <div class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="img/clients/cgi-logo.jpg" alt="clients image">
                    </div>
                </div>

                <div class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="img/clients/oracle-logo.jpg" alt="clients image">
                    </div>
                </div>

                <div class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="img/clients/huawei-logo.jpg" alt="clients image">
                    </div>
                </div>

                <div class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="img/clients/mapei-logo.jpg" alt="clients image">
                    </div>
                </div>

                <div class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="img/clients/colo-cola-logo.jpg" alt="clients image">
                    </div>
                </div>

                <div class="col-lg-auto col-md-2 col-sm-3 col-4">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="img/clients/ag-software-logo.jpg" alt="clients image">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="layout-pt-lg layout-pb-lg">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title "><span class="text-purple-1">BIGG</span> Themes</h2>

                        <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 pt-50">


                <div class="col-lg-3 col-md-6">
                    <div class="row y-gap-30">
                        <div class="col-12">
                            <div class="categoryCard -type-1">
                                <div class="categoryCard__image">
                                    <div class="bg-image ratio ratio-30:35 js-lazy" data-bg="img/theme/5.png"></div>
                                </div>
                                <div class="categoryCard__content text-center">
                                    <h4 class="categoryCard__title text-20 lh-15 fw-600 text-white">Corporate BIGGIFT</h4>
                                    <!-- <div class="categoryCard__subtitle text-13 text-white lh-1 mt-5">573+ Courses </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="row y-gap-30">
                        <div class="col-12">
                            <div class="categoryCard -type-1">
                                <div class="categoryCard__image">
                                    <div class="bg-image ratio ratio-30:35 js-lazy" data-bg="img/theme/5.png"></div>
                                </div>
                                <div class="categoryCard__content text-center">
                                    <h4 class="categoryCard__title text-20 lh-15 fw-600 text-white">BIGG Home Delivery</h4>
                                    <!-- <div class="categoryCard__subtitle text-13 text-white lh-1 mt-5">573+ Courses </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="row y-gap-30">

                        <div class="col-lg-12">
                            <div class="categoryCard -type-1">
                                <div class="categoryCard__image">
                                    <div class="bg-image ratio ratio-30:16 js-lazy" data-bg="img/theme/1.png"></div>
                                </div>
                                <div class="categoryCard__content text-center">
                                    <h4 class="categoryCard__title text-20 lh-15 fw-600 text-white">Joinee BIGG KIT</h4>
                                    <!-- <div class="categoryCard__subtitle text-13 text-white lh-1 mt-5">573+ Courses </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="categoryCard -type-1">
                                <div class="categoryCard__image">
                                    <div class="bg-image ratio ratio-30:16 js-lazy" data-bg="img/theme/1.png"></div>
                                </div>
                                <div class="categoryCard__content text-center">
                                    <h4 class="categoryCard__title text-20 lh-15 fw-600 text-white">BIGG Vouchers</h4>
                                    <!-- <div class="categoryCard__subtitle text-13 text-white lh-1 mt-5">573+ Courses </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="row y-gap-30">
                        <div class="col-12">
                            <div class="categoryCard -type-1">
                                <div class="categoryCard__image">
                                    <div class="bg-image ratio ratio-30:35 js-lazy" data-bg="img/theme/5.png"></div>
                                </div>
                                <div class="categoryCard__content text-center">
                                    <h4 class="categoryCard__title text-20 lh-15 fw-600 text-white">BIGG Brandstore</h4>
                                    <!-- <div class="categoryCard__subtitle text-13 text-white lh-1 mt-5">573+ Courses </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title "><span class="text-purple-1">BIGG</span> Categories</h2>

                        <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p>

                    </div>

                </div>

                <div class="col-auto">

                    <div class="d-flex x-gap-15 items-center justify-center">
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-left-hover js-cat-slider-prev">
                                <i class="fa fa-arrow-left"></i>
                            </button>
                        </div>
                        <div class="col-auto">
                            <div class="pagination -arrows js-cat-slider-pag"></div>
                        </div>
                        <div class="col-auto">
                            <button class="d-flex items-center text-24 arrow-right-hover js-cat-slider-next">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="overflow-hidden pt-50 js-section-slider" data-gap="30" data-loop
                data-slider-cols="xl-6 lg-4 md-3 sm-2" data-pagination="js-cat-slider-pag"
                data-nav-prev="js-cat-slider-prev" data-nav-next="js-cat-slider-next">
                <div class="swiper-wrapper">

                    <div class="swiper-slide h-100">
                        <div data-anim-child="slide-left delay-2">
                            <div class="featureCard -type-1 -featureCard-hover-3">
                                <div class="featureCard__content">
                                    <div class="featureCard__icon">
                                        <img src="img/categories/apparels.png" alt="icon">
                                    </div>
                                    <div class="featureCard__title">Apparels</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-100">
                        <div data-anim-child="slide-left delay-3">
                            <div class="featureCard -type-1 -featureCard-hover-3">
                                <div class="featureCard__content">
                                    <div class="featureCard__icon">
                                        <img src="img/categories/stationery.png" alt="icon">
                                    </div>
                                    <div class="featureCard__title">Stationery</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-100">
                        <div data-anim-child="slide-left delay-4">
                            <div class="featureCard -type-1 -featureCard-hover-3">
                                <div class="featureCard__content">
                                    <div class="featureCard__icon">
                                        <img src="img/categories/electronics.png" alt="icon">
                                    </div>
                                    <div class="featureCard__title">Electronics</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-100">
                        <div data-anim-child="slide-left delay-5">
                            <div class="featureCard -type-1 -featureCard-hover-3">
                                <div class="featureCard__content">
                                    <div class="featureCard__icon">
                                        <img src="img/categories/accessories.png" alt="icon">
                                    </div>
                                    <div class="featureCard__title">Accessories</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-100">
                        <div data-anim-child="slide-left delay-6">
                            <div class="featureCard -type-1 -featureCard-hover-3">
                                <div class="featureCard__content">
                                    <div class="featureCard__icon">
                                        <img src="img/categories/apparels.png" alt="icon">
                                    </div>
                                    <div class="featureCard__title">Bags</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide h-100">
                        <div data-anim-child="slide-left delay-7">
                            <div class="featureCard -type-1 -featureCard-hover-3">
                                <div class="featureCard__content">
                                    <div class="featureCard__icon">
                                        <img src="img/categories/electronics.png" alt="icon">
                                    </div>
                                    <div class="featureCard__title">Gadgets</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg bg-dark-2">
        <div data-anim-wrap class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-lg-6 col-md-10">
                    <h2 class="text-30 lh-15 text-white"><span class="text-black">BIGGIFT</span> Success Stories</h2>
                    <p class="text-white mt-10">Our client's love towards us is more than words.</p>
                    <div class="row x-gap-50 y-gap-30 pt-60 lg:pt-40 pr-40 md:pr-0">

                        <div class="col-sm-6 text-white">
                            <div class="text-45 lh-11 fw-700">4.5/5 </div>
                            <div class="mt-10">Customer Reviews</div>
                        </div>

                        <div class="col-sm-6 text-white">
                            <div class="text-45 lh-11 fw-700">100%</div>
                            <div class="mt-10">Growth in FI 2021-2022</div>
                        </div>

                    </div>

                    <div class="d-inline-block">
                        <a href="instructors-list-1.html" class="button -icon -red-1 text-orange-1 mt-30">
                            Write us a review &nbsp; <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>

                </div>

                <div class="col-lg-4 offset-lg-1">
                    <div class="testimonials-slider-2 js-testimonials-slider-2">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide shadow-2">
                                <div class="testimonials -type-1">
                                    <div class="testimonials__content">
                                        <h4 class="testimonials__title">Great Work</h4>
                                        <p class="testimonials__text"> “I think Educrat is the best theme I ever seen this
                                            year. Amazing design, easy to customize and a design quality superlative account
                                            on its cloud platform for the optimized performance”</p>

                                        <div class="testimonials-footer">
                                            <div class="testimonials-footer__image">
                                                <img src="img/testimonials/cgi.png" alt="image">
                                            </div>

                                            <div class="testimonials-footer__content">
                                                <div class="testimonials-footer__title">Courtney Henry</div>
                                                <div class="testimonials-footer__text">Web Designer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide shadow-2">
                                <div class="testimonials -type-1">
                                    <div class="testimonials__content">
                                        <h4 class="testimonials__title">Great Work</h4>
                                        <p class="testimonials__text"> “I think Educrat is the best theme I ever seen this
                                            year. Amazing design, easy to customize and a design quality superlative account
                                            on its cloud platform for the optimized performance”</p>

                                        <div class="testimonials-footer">
                                            <div class="testimonials-footer__image">
                                                <img src="img/testimonials/mapei.png" alt="image">
                                            </div>

                                            <div class="testimonials-footer__content">
                                                <div class="testimonials-footer__title">Ronald Richards</div>
                                                <div class="testimonials-footer__text">President of Sales</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide shadow-2">
                                <div class="testimonials -type-1">
                                    <div class="testimonials__content">
                                        <h4 class="testimonials__title">Great Work</h4>
                                        <p class="testimonials__text"> “I think Educrat is the best theme I ever seen this
                                            year. Amazing design, easy to customize and a design quality superlative account
                                            on its cloud platform for the optimized performance”</p>

                                        <div class="testimonials-footer">
                                            <div class="testimonials-footer__image">
                                                <img src="img/testimonials/cgi.png" alt="image">
                                            </div>

                                            <div class="testimonials-footer__content">
                                                <div class="testimonials-footer__title">Annette Black</div>
                                                <div class="testimonials-footer__text">Nursing Assistant</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="d-flex x-gap-15 items-center justify-center pt-30">
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-left-hover text-white js-prev">
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <div class="pagination -arrows text-white js-pagination"></div>
                            </div>
                            <div class="col-auto">
                                <button class="d-flex items-center text-24 arrow-right-hover text-white js-next">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="svg-shape">
        <svg width="1925" height="261" viewBox="0 0 1925 261" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M1924.67 0L1922.7 7.03707C1911.58 46.7293 1877.25 75.5353 1836.23 79.5878L0 261V0H1924.67Z"
                fill="#E31E24" />
        </svg>
    </div>


    <section class="section-bg pt-80 pb-80 lg:pt-60 lg:pb-60 mb-80 bigg-cat1" style="margin-top:85px;">
        <div class="section-bg__item bg-light-7"></div>
        <div class="container">
            <div class="row y-gap-30 justify-between items-center">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="pl-60 lg:pl-0" style="color:#fff;line-height:38px;">
                        <h2 class="text-30 lh-12">Corporate <span>BIGG</span>Catalog</h2>
                        <p class="mt-30">A place where you buy emotions.</p>
                        <!-- <div class="app-content__buttons mt-30">
                      <a href="#"><img src="img/app/buttons/1.svg" alt="button"></a>
                      <a href="#"><img src="img/app/buttons/2.svg" alt="button"></a>
                    </div> -->


                        <div class="d-flex items-center">
                            <div class="about-content-list__icon">
                                <img src="img/check.png" alt="image">&nbsp;&nbsp;
                            </div>
                            <div class="about-content-list__title"> Online catalog of 4000+ products</div>
                        </div>

                        <div class="d-flex items-center">
                            <div class="about-content-list__icon">
                                <img src="img/check.png" alt="image">&nbsp;&nbsp;
                            </div>
                            <div class="about-content-list__title"> Advanced search feature</div>
                        </div>

                        <div class="d-flex items-center">
                            <div class="about-content-list__icon">
                                <img src="img/check.png" alt="image">&nbsp;&nbsp;
                            </div>
                            <div class="about-content-list__title"> Generate catalog into PDF easily</div>
                        </div>

                        <div class="d-inline-block">
                            <a href="instructors-list-1.html" class="button -icon -red-2 text-orange-1 mt-30">
                                Go To BIGG Catalog
                                &nbsp; <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="img/mock.png" alt="image">
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Why <span class="text-purple-1">BIGGIFT</span></h2>

                        <p class="sectionTitle__text ">Precious things under a single roof.</p>

                    </div>

                </div>
            </div>

            <div class="row y-gap-30 justify-between pt-60 lg:pt-50">

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <img src="img/delivery.png" alt="image">
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Guaranteed Delivery</h5>
                            <p class="coursesCard__text text-14 mt-10">The latest design trends meet hand-crafted templates
                                in Sassio Collection.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <img src="img/packaging.png" alt="image">
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Ecofriendly Packaging</h5>
                            <p class="coursesCard__text text-14 mt-10">The latest design trends meet hand-crafted templates
                                in Sassio Collection.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <img src="img/quality.png" alt="image">
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Quality Products</h5>
                            <p class="coursesCard__text text-14 mt-10">The latest design trends meet hand-crafted templates
                                in Sassio Collection.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-3 px-0 text-center">
                        <div class="coursesCard__icon bg-white shadow-2">
                            <img src="img/on-time.png" alt="image">
                        </div>

                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">Timely Delivery</h5>
                            <p class="coursesCard__text text-14 mt-10">The latest design trends meet hand-crafted templates
                                in Sassio Collection.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg">
        <div class="container">
            <div class="row y-gap-50">
                <div class="col-xl-3 col-lg-5 col-md-8">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">Brands <span class="text-purple-1">BIGGIFT</span> Work with</h2>

                        <p class="sectionTitle__text ">We have everything you need.</p>

                    </div>


                    <div class="d-inline-block">
                        <a href="instructors-list-1.html" class="button -icon -red-2 text-orange-1 mt-30">
                            Go To BIGG Catalog
                            &nbsp; <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="offset-xl-1 col-lg-8">
                    <div class="overflow-hidden js-section-slider" data-loop data-pagination
                        data-slider-cols="xl-4 lg-4 md-2 sm-2">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="d-flex flex-column items-center">
                                    <div>
                                        <img src="img/brands/levis.png" alt="image">
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column items-center">
                                    <div>
                                        <img src="img/brands/ug.png" alt="image">
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column items-center">
                                    <div>
                                        <img src="img/brands/portronics.png" alt="image">
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column items-center">
                                    <div>
                                        <img src="img/brands/adidas.png" alt="image">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                            <div class="col-auto">
                                <div class="pagination -arrows js-pagination"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    @parent

    <script type="text/javascript"></script>
@endsection
