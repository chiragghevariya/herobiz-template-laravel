@extends('front.common.layout')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            @if (isset($heading))
            <h2>{{ $heading->portfolio_title }} Details</h2>
            @endif
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            @if (isset($heading))
            <li>{{ $heading->portfolio_title }} Details</li>
            @endif
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                @if (isset($portfolio))

                <div class="swiper-slide">
                  <img src="{{ asset('uploads/portfolio/' . $portfolio->image) }}" alt="">
                </div>
               @endif

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: Web design</li>
                <li><strong>Client</strong>: ASU Company</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul>
            </div>
            <div class="portfolio-description">
                @if (isset($portfolio))
              <h2>{{ $portfolio->title }}</h2>
              <p>
                {!! $portfolio->long_description !!}
              </p>
              @endif
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

@endsection
