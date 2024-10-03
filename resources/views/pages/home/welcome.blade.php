@extends('layouts.hometemplate')

@section('hometemplate')
<section class="banner-area banner-bg" data-background="{{asset('homeassets/img/banner/Animal-HD-WAllpaper-3.jpg')}}">

<div class="container custom-container">
    <div class="row">
        <div class="col-xl-6 col-lg-8">
            <div class="banner-content">
                <h6 class="sub-title wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.8s">Cinema World</h6>
                <h2 class="title wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.8s">Book Your Favourite <span> Movie </span>From Your Favourite <span>Cinema</span></h2>
                <div class="banner-meta wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1.8s">
                    <!-- <ul>
                        <li class="quality">
                            <span>Pg 18</span>
                            <span>hd</span>
                        </li>
                        <li class="category">
                            <a href="#">Romance,</a>
                            <a href="#">Drama</a>
                        </li>
                        <li class="release-time">
                            <span><i class="far fa-calendar-alt"></i> 2021</span>
                            <span><i class="far fa-clock"></i> 128 min</span>
                        </li>
                    </ul> -->
                </div>
                <a href="/showmovie" class="banner-btn btn" data-wow-delay=".8s" data-wow-duration="1.8s"><i class="fas fa-play" ></i>Book Now</a>
            </div>
        </div>
    </div>
</div>
</section>
<section class="ucm-area ucm-bg" data-background="{{asset('homeassets/img/bg/ucm_bg.jpg')}}">
<div class="ucm-bg-shape" data-background="{{asset('homeassets/img/bg/ucm_bg_shape.png')}}"></div>
<div class="container">
    <div class="row align-items-end mb-55">
        <div class="col-lg-6">
            <div class="section-title text-center text-lg-left">
                <span class="sub-title">ONLINE STREAMING</span>
                <h2 class="title">Upcoming Movies</h2>
            </div>
        </div>
        
</section>
@endsection