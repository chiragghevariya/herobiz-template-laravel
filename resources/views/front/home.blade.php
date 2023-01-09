@extends('front.common.layout ')
@section('content')
    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            @if (isset($heading))
                <img src="{{ asset('uploads/heading') }}/{{ $heading->home_image }}" class="img-fluid animated">
                <h2>{{ $heading->home_title }}</h2>
                <p>{{ $heading->home_description }}</p>
            @endif
            <div class="d-flex">
                <a href="{{ route('home') }}#about" class="btn-get-started scrollto">Get Started</a>
                @if (isset($getsetting))
                    <a href="{{ $getsetting->video_url }}" target="_blank"
                        class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                @endif
            </div>
        </div>
    </section>

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row gy-4">

                    @if (isset($getservice) && !$getservice->isEmpty())
                        @foreach ($getservice as $key => $v)
                            <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                                <div class="service-item position-relative">
                                    <div class="icon"><i class="{{ $v->icon }} icon"></i></div>
                                    <h4><a href="" class="stretched-link">{{ $v->title }}</a></h4>
                                    <p>{!! $v->long_description !!}</p>
                                </div>
                            </div><!-- End Service Item -->
                        @endforeach
                    @endif
                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->about_title }}</h2>
                        <p>{{ $heading->about_description }}</p>
                    @endif
                </div>

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            @if (isset($heading))
                                <img src="{{ asset('uploads/heading/' . $heading->image) }}" class="img-fluid"
                                    alt="">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-7">
                        @if (isset($heading))
                            <h3 class="pt-0 pt-lg-5">{{ $heading->title }}</h3>
                        @endif

                        <!-- Tabs -->
                        @if (isset($getfeature) && !$getfeature->isEmpty())
                            <ul class="nav nav-pills mb-3">
                                @foreach ($getfeature as $key => $v)
                                    <li><a class="nav-link @if ($v->id == 1) active @endif "
                                            data-bs-toggle="pill" href="#tab1">{{ $v->title }}</a></li>
                                @endforeach
                            </ul><!-- End Tabs -->

                            <!-- Tab Content -->
                            <div class="tab-content">
                                @foreach ($getfeature as $key => $v)
                                    <div class="tab-pane fade @if ($v->id == 1) show active @endif "
                                        id="tab1">

                                        {!! $v->long_description !!}

                                    </div><!-- End Tab 1 Content -->
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-out">

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        @if (isset($logo) && !$logo->isEmpty())
                            @foreach ($logo as $key => $v)
                                <div class="swiper-slide"><img src="{{ asset('uploads/logo/' . $v->image) }}"
                                        class="img-fluid" alt=""></div>
                            @endforeach
                        @endif

                    </div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-out">

                <div class="row g-5">

                    <div
                        class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                        @if (isset($heading))
                            <h3>{{ $heading->calltoaction_title }}</h3>
                            <p>{{ $heading->calltoaction_description }}</p>
                        @endif
                        <a class="cta-btn align-self-start" href="#">Call To Action</a>
                    </div>

                    <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                        <div class="img">
                            @if (isset($heading))
                                <img src="{{ asset('uploads/quote/' . $heading->quote_image) }}" alt=""
                                    class="img-fluid">
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Call To Action Section -->

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">
                    <div class="col-lg-6 video-play position-relative">
                        @if (isset($getsetting))
                            <a target="_blank" href="{{ $getsetting->video_url }}" class="glightbox play-btn"></a>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            @if (isset($heading))
                                <h3>{{ $heading->short_description }}</h3>
                                {!! $heading->long_description !!}
                            @endif
                            <a href="#" class="read-more align-self-start"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End On Focus Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                @if (isset($feature) && !$feature->isEmpty())
                    <ul class="nav nav-tabs row gy-4 d-flex">

                        @foreach ($feature as $key => $v)
                            <li class="nav-item col-6 col-md-4 col-lg-2">
                                <a class="nav-link @if ($key == 0) active show @endif"
                                    data-bs-toggle="tab" data-bs-target="#tab-{{ $v->id }}">
                                    <i class="{{ $v->icon }}"></i>
                                    <h4>{{ $v->title }}</h4>
                                </a>
                            </li><!-- End Tab 1 Nav -->
                        @endforeach

                    </ul>


                    <div class="tab-content">
                        @foreach ($feature as $key => $v)
                            <div class="tab-pane @if ($key == 0) active show @endif "
                                id="tab-{{ $v->id }}">
                                <div class="row gy-4">
                                    <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">

                                        <h3>{{ $v->title }}</h3>
                                        {!! $v->long_description !!}
                                    </div>
                                    <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up"
                                        data-aos-delay="200">
                                        <img src="{{ asset('uploads/feature/' . $v->image) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div><!-- End Tab Content 1 -->
                        @endforeach
                    </div>
                @endif

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->service_title }}</h2>
                        <p>{{ $heading->service_description }}</p>
                    @endif
                </div>

                <div class="row gy-5">

                    @if (isset($service) && !$service->isEmpty())
                        @foreach ($service as $key => $v)
                            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                                <div class="service-item">
                                    <div class="img">
                                        <img src="{{ asset('uploads/service/' . $v->image) }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="details position-relative">
                                        <div class="icon">
                                            <i class="{{ $v->icon }}"></i>
                                        </div>
                                        <a href="#" class="stretched-link">
                                            <h3>{{ $v->title }}</h3>
                                        </a>
                                        <p>{!! $v->long_description !!}</p>
                                    </div>
                                </div>
                            </div><!-- End Service Item -->
                        @endforeach
                    @endif

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">

                        @if (isset($testimonial) && !$testimonial->isEmpty())
                            @foreach ($testimonial as $key => $v)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <img src="{{ asset('uploads/testimonial/' . $v->image) }}"
                                            class="testimonial-img" alt="">
                                        <h3>{{ $v->name }}</h3>
                                        <h4>{{ $v->position }}</h4>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            {{ $v->description }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
                            @endforeach
                        @endif

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->pricing_title }}</h2>
                        <p>{{ $heading->pricing_description }}</p>
                    @endif
                </div>

                <div class="row gy-4">

                    @if (isset($pricing) && !$pricing->isEmpty())
                        @foreach ($pricing as $key => $v)
                            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                                <div class="pricing-item">

                                    <div class="pricing-header">
                                        <h3>{{ $v->title }}</h3>
                                        <h4><sup>$</sup>{{ $v->amount }}<span> / month</span></h4>
                                    </div>

                                    {!! $v->long_description !!}

                                    <div class="text-center mt-auto">
                                        <a href="#" class="buy-btn">Buy Now</a>
                                    </div>

                                </div>
                            </div><!-- End Pricing Item -->
                        @endforeach
                    @endif

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content px-xl-5">
                            @if (isset($heading))
                                <h3>{{ $heading->faq_title }}</h3>
                                <p>{{ $heading->faq_description }}</p>
                            @endif
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">

                            @if (isset($faq) && !$faq->isEmpty())
                                @foreach ($faq as $key => $v)
                                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-content-{{ $v->id }}">
                                                <i class="bi bi-question-circle question-icon"></i>
                                                {{ $v->question }} </button>
                                        </h3>
                                        <div id="faq-content-{{ $v->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist">
                                            <div class="accordion-body">
                                                {{ $v->answer }}
                                            </div>
                                        </div>
                                    </div><!-- # Faq item-->
                                @endforeach
                            @endif

                        </div>

                    </div>
                    @if (isset($heading))
                        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                            style='background-image: url("{{ asset('uploads/heading/' . $heading->faq_image) }}");'>&nbsp;
                        </div>
                    @endif
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio" data-aos="fade-up">

            <div class="container">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->portfolio_title }}</h2>
                        <p>{{ $heading->portfolio_description }}</p>
                    @endif
                </div>

            </div>

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">

                    @if (isset($portfolio) && !$portfolio->isEmpty())
                        <ul class="portfolio-flters">

                            <li data-filter="*" class="filter-active">All</li>

                            @foreach ($portfolio as $key => $v)
                                <li data-filter=".filter-{{ $v->name }}">{{ $v->name }}</li>
                            @endforeach

                        </ul><!-- End Portfolio Filters -->
                    @endif

                    <div class="row g-0 portfolio-container">

                        @if (isset($getportfolio) && !$getportfolio->isEmpty())
                            @foreach ($getportfolio as $key => $v)
                                <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item filter-{{ $v->name }}">
                                    <img src="{{ asset('uploads/portfolio/' . $v->image) }}" class="img-fluid"
                                        alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ $v->name }}</h4>
                                        <a href="{{ asset('uploads/portfolio/' . $v->image) }}" title="App 1"
                                            data-gallery="portfolio-gallery" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="{{ route('portfolio_details', $v->slug) }}" title="More Details"
                                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div><!-- End Portfolio Item -->
                            @endforeach
                        @endif

                    </div><!-- End Portfolio Container -->

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->team_title }}</h2>
                        <p>{{ $heading->team_description }}</p>
                    @endif
                </div>

                <div class="row gy-5">

                    @if (isset($team) && !$team->isEmpty())
                        @foreach ($team as $key => $v)
                            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                                <div class="team-member">

                                    <div class="member-img">
                                        <img src="{{ asset('uploads/team/' . $v->image) }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="member-info">
                                        <div class="social">
                                            @if ($v->t_link != null)
                                                <a href="{{ $v->t_link }}" target="_blank"><i
                                                        class="bi bi-twitter"></i></a>
                                            @endif
                                            @if ($v->i_link != null)
                                                <a href="{{ $v->f_link }}" target="_blank"><i
                                                        class="bi bi-facebook"></i></a>
                                            @endif
                                            @if ($v->i_link != null)
                                                <a href="{{ $v->i_link }}" target="_blank"><i
                                                        class="bi bi-instagram"></i></a>
                                            @endif
                                            @if ($v->i_link != null)
                                                <a href="{{ $v->l_link }}" target="_blank"><i
                                                        class="bi bi-linkedin"></i></a>
                                            @endif
                                        </div>
                                        <h4>{{ $v->name }}</h4>
                                        <span>{{ $v->position }}</span>
                                    </div>
                                </div>
                            </div><!-- End Team Member -->
                        @endforeach
                    @endif
                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->blog_title }}</h2>
                        <p>{{ $heading->blog_description }}</p>
                    @endif
                </div>

                <div class="row">

                    @if (isset($blog) && !$blog->isEmpty())
                        @foreach ($blog as $key => $v)
                            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="post-box">
                                    <div class="post-img"><img src="{{ asset('uploads/blog/' . $v->image) }}"
                                            height="200px" width="300px" class="img-fluid" alt=""></div>
                                    <div class="meta">
                                        <span class="post-date">{{ $v->date }}</span>
                                        <span class="post-author"> /{{ $v->name }} </span>
                                    </div>
                                    <h3 class="post-title">{{ $v->title }}</h3>
                                    <p>{!! $v->description !!}</p>
                                    <a href="{{ route('blog_details', $v->slug) }}"
                                        class="readmore stretched-link"><span>Read More</span><i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    @if (isset($heading))
                        <h2>{{ $heading->contact_title }}</h2>
                        <p>{{ $heading->contact_description }}</p>
                    @endif

                </div>

            </div>

            <div class="map">
                @if (isset($getsetting))
                    <iframe src="{{ $getsetting->map_url }}" frameborder="0" allowfullscreen></iframe>
                @endif
            </div><!-- End Google Maps -->

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            @if (isset($heading))
                                <h3>{{ $heading->git_title }}</h3>
                                <p>{{ $heading->git_description }}</p>
                            @endif

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    @if (isset($getsetting))
                                        <p>{{ $getsetting->location }}</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    @if (isset($getsetting))
                                        <p>{{ $getsetting->email }}</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    @if (isset($getsetting))
                                        <p>{{ $getsetting->number }}</p>
                                    @endif
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        {{ Form::open([
                            'id' => 'contact',
                            'class' => 'FromSubmit php-email-form',
                            'url' => route('contact.store'),
                            'data-redirect_url' => route('home'),
                            'name' => 'contact',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name">
                                <span class="text-danger" id="name_error"></span>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email">
                                <span class="text-danger" id="email_error"></span>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject">
                            <span class="text-danger" id="subject_error"></span>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="Message"></textarea>
                            <span class="text-danger" id="message_error"></span>
                        </div>

                        <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
