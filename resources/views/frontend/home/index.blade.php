@extends('frontend.layouts.master')
@section('frontend_content')
   


    <!--============================
                                            BANNER PART 2 START
                            ==============================-->
    @include('frontend.home.sections.home-slider')
    <!--============================
                                            BANNER PART 2 END
                            ==============================-->


    <!--============================
                                            FLASH SELL START
                                        ==============================-->
    @include('frontend.home.sections.home-flash-sell')
    <!--============================
                                            FLASH SELL END
                                        ==============================-->


    <!--============================
                                           MONTHLY TOP PRODUCT START
                                        ==============================-->
    @include('frontend.home.sections.home-montly-section')
    <!--============================
                                           MONTHLY TOP PRODUCT END
                                        ==============================-->


    <!--============================
                                            BRAND SLIDER START
                                        ==============================-->
    @include('frontend.home.sections.home-brands-slider')
    <!--============================
                                            BRAND SLIDER END
                                        ==============================-->


    <!--============================
                                            SINGLE BANNER START
                                        ==============================-->
    @include('frontend.home.sections.home-single-banner')
    <!--============================
                                            SINGLE BANNER END
                                        ==============================-->


    <!--============================
                                            HOT DEALS START
                                        ==============================-->
    @include('frontend.home.sections.home-hot-deals')
    <!--============================
                                            HOT DEALS END
                                        ==============================-->


    <!--============================
                                            ELECTRONIC PART START
                                        ==============================-->
    @include('frontend.home.sections.home-product-slider')
    <!--============================
                                            ELECTRONIC PART END
                                        ==============================-->


    <!--============================
                                            ELECTRONIC PART START
                                        ==============================-->
    @include('frontend.home.sections.home-product-slider-2')
    <!--============================
                                            ELECTRONIC PART END
                                        ==============================-->


    <!--============================
                                            LARGE BANNER  START
                                        ==============================-->
    @include('frontend.home.sections.home-bottom-banner')
    <!--============================
                                            LARGE BANNER  END
                                        ==============================-->


    <!--============================
                                            WEEKLY BEST ITEM START
                                        ==============================-->
    @include('frontend.home.sections.home-weekly-product')
    <!--============================
                                            WEEKLY BEST ITEM END
                                        ==============================-->


    <!--============================
                                          HOME SERVICES START
                                        ==============================-->
    @include('frontend.home.sections.home-bottom-services')
    <!--============================
                                            HOME SERVICES END
                                        ==============================-->


    <!--============================
                                            HOME BLOGS START
                                        ==============================-->
    @include('frontend.home.sections.home-blogs')
    <!--============================
                                            HOME BLOGS END
                                        ==============================-->
@endsection
