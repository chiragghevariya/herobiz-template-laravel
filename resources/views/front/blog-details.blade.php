@extends('front.common.layout')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    @if (isset($heading))
                        <h2>{{ $heading->blog_title }} Details</h2>
                    @endif
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        @if (isset($heading))
                            <li>{{ $heading->blog_title }} Details</li>
                        @endif
                    </ol>

                </div>
            </div><!-- End Breadcrumbs -->

            <!-- ======= Blog Details Section ======= -->
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row g-5">

                        <div class="col-lg-8">

                            <article class="blog-details">

                                @if (isset($blog))
                                    <div class="post-img">
                                        <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt=""
                                            class="img-fluid">
                                    </div>

                                    <h2 class="title">{{ $blog->title }}</h2>

                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                                {{ $blog->name }}
                                            <li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                                    datetime="2020-01-01">{{ $blog->date }}</time>
                                            </li>

                                        </ul>
                                    </div><!-- End meta top -->

                                    <div class="content">
                                        {!! $blog->long_description !!}
                                    </div><!-- End meta bottom -->
                                @endif

                            </article><!-- End blog post -->




                        </div>

                        <div class="col-lg-4">

                            <div class="sidebar">

                                <div class="sidebar-item search-form">
                                    <h3 class="sidebar-title">Search</h3>
                                    <form action="" class="mt-3">
                                        <input type="text">
                                        <button type="submit"><i class="bi bi-search"></i></button>
                                    </form>
                                </div><!-- End sidebar search formn-->

                                <div class="sidebar-item categories">
                                    <h3 class="sidebar-title">Categories</h3>
                                    <ul class="mt-3">
                                        @if (isset($categories) && !$categories->isEmpty())
                                            @foreach ($categories as $key => $v)
                                                <li><a href="">{{ $v->name }} <span>( {{ $v->id }}
                                                            )</span></a></li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div><!-- End sidebar categories-->

                                <div class="sidebar-item recent-posts">
                                    <h3 class="sidebar-title">Recent Posts</h3>

                                    <div class="mt-3">

                                        @if (isset($posts) && !$posts->isEmpty())
                                            @foreach ($posts as $key => $v)
                                                <div class="post-item mt-3">
                                                    <img src="{{ asset('uploads/blog/' . $v->image) }}" alt=""
                                                        class="flex-shrink-0">
                                                    <div>
                                                        <h4><a href="blog-post.html">{{ $v->title }}</a></h4>
                                                        <time datetime="2020-01-01">{{ $v->date }}</time>
                                                    </div>
                                                </div><!-- End recent post item-->
                                            @endforeach
                                        @endif


                                    </div>

                                </div><!-- End sidebar recent posts-->

                                <div class="sidebar-item tags">
                                    <h3 class="sidebar-title">Tags</h3>
                                    <ul class="mt-3">

                                        @if (isset($tag) && !$tag->isEmpty())
                                            @foreach ($tag as $key => $v)
                                                <li><a href="">{{ $v->name }}</a></li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div><!-- End sidebar tags-->

                            </div><!-- End Blog Sidebar -->

                        </div>
                    </div>

                </div>
            </section><!-- End Blog Details Section -->

    </main><!-- End #main -->
@endsection
