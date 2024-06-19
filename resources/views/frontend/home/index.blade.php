@extends('frontend.layouts.master')

@section('content')
    <!--========================== BANNER PART START ===========================-->
    @include('frontend.home.sections.banner')
    <!--========================== BANNER PART END ===========================-->


    <!--========================== CATEGORY SLIDER START ===========================-->
    @include('frontend.home.sections.category')
    <!--==========================CATEGORY SLIDER END ===========================-->


    <!--========================== FEATURES PART START ===========================-->
    @include('frontend.home.sections.features')
    <!--========================== FEATURES PART END ===========================-->


    <!--========================== COUNTER PART START ===========================-->
    @include('frontend.home.sections.counter')
    <!--========================== COUNTER PART END ===========================-->


    <!--========================== OUR CATEGORY START ===========================-->
    @include('frontend.home.sections.our-category')
    <!--========================== OUR CATEGORY END ===========================-->


    <!--========================== OUR LOCATION START ===========================-->
    @include('frontend.home.sections.our-location')
    <!--========================== OUR LOCATION END ===========================-->


    <!--========================== FEATURED LISTING START ===========================-->
    @include('frontend.home.sections.featured-listing')
    <!--========================== FEATURED LISTING END ===========================-->


    <!--========================== OUR PACKAGE START ===========================-->
    @include('frontend.home.sections.our-package')
    <!--========================== OUR PACKAGE END ===========================-->


    <!--============================ TESTIMONIAL PART START ==============================-->
    @include('frontend.home.sections.testimonial')
    <!--============================ TESTIMONIAL PART END ==============================-->


    <!--========================== BLOG PART START ===========================-->
    @include('frontend.home.sections.blog')
    <!--========================== BLOG PART END ===========================-->
@endsection
