@extends('admin.layout')
@section('content')
    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-nature-people menu-icon"></i> <a href="{{ route('team.index') }}" class="ab">TEAM</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <a href="{{ route('testimonial.index') }}" class="ab">TESTIMONIAL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-comment-question-outline menu-icon"></i>
                          <a href="{{ route('faq.index') }}" class="ab">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                        <a href="{{ route('pricing.index') }}" class="ab">PRICING</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-information menu-icon"></i>
                        <a href="{{ route('service.index') }}" class="ab">SERVICES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-animation menu-icon"></i>
                        <a href="{{ route('portfolio.index') }}" class="ab">PORTFOLIO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-blogger menu-icon"></i>
                        <a href="{{ route('blog.index') }}" class="ab">BLOG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-information-outline menu-icon"></i>
                        <a href="{{ route('categories.index') }}" class="ab">CATEGORIES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-tag-multiple menu-icon"></i>
                        <a href="{{ route('tag.index') }}" class="ab">TAG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-gamepad menu-icon"></i>
                        <a href="{{ route('feature.index') }}" class="ab">FEATURES</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <a href="{{ route('logo.index') }}" class="ab">LOGO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-signal-variant menu-icon"></i>
                        <a href="{{ route('socialmedia.index') }}" class="ab">SOCIAL MEDIA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-phone-plus menu-icon"></i>
                        <a href="{{ route('contact.index') }}" class="ab">CONTACT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-contact-mail menu-icon"></i>
                        <a href="{{ route('newslater.index') }}" class="ab">NEWS LATER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        <a href="{{ route('heading.index') }}" class="ab">HEADINGS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-book-multiple menu-icon"></i>
                        <a href="{{ route('cms.index') }}" class="ab">CMS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="col-xl-3 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <i class="mdi mdi-settings menu-icon"></i>
                        <a href="{{ route('setting.index') }}" class="ab">GENERAL SETTING</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
