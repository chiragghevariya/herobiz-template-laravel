@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i
                        class="mdi mdi-record
            "></i>
                </li>

                <li class="ab active">
                    Edit Heading
                </li>

            </ul>
        </div>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Heading
                    @endif

                    <hr>

                    <p class="card-description">Heading info</p>

                    @if (isset($editdata))
                        {{ Form::model($editdata, [
                            'id' => 'heading',
                            'class' => 'FromSubmit form-horizontal',
                            'data-redirect_url' => route('heading.index'),
                            'url' => route('heading.update', Crypt::encrypt($editdata->id)),
                            'method' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('home_title', null, [
                                'id' => 'home_title',
                                'placeholder' => 'Enter home title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="home_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('home_description', null, [
                                'id' => 'home_description',
                                'placeholder' => 'Enter home description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="home_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('about_title', null, [
                                'id' => 'about_title',
                                'placeholder' => 'Enter about title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="about_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('about_description', null, [
                                'id' => 'about_description',
                                'placeholder' => 'Enter about description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="about_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pricing Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('pricing_title', null, [
                                'id' => 'pricing_title',
                                'placeholder' => 'Enter pricing title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="pricing_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Pricing Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('pricing_description', null, [
                                'id' => 'pricing_description',
                                'placeholder' => 'Enter pricing description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="pricing_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('service_title', null, [
                                'id' => 'service_title',
                                'placeholder' => 'Enter service title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="service_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('service_description', null, [
                                'id' => 'service_description',
                                'placeholder' => 'Enter service description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="service_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('contact_title', null, [
                                'id' => 'contact_title',
                                'placeholder' => 'Enter contact title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="contact_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('contact_description', null, [
                                'id' => 'contact_description',
                                'placeholder' => 'Enter contact description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="contact_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Portfolio Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('portfolio_title', null, [
                                'id' => 'portfolio_title',
                                'placeholder' => 'Enter portfolio title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="portfolio_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Portfolio Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('portfolio_description', null, [
                                'id' => 'portfolio_description',
                                'placeholder' => 'Enter portfolio description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="portfolio_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Team Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('team_title', null, [
                                'id' => 'team_title',
                                'placeholder' => 'Enter team title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="team_title_error"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Team Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('team_description', null, [
                                'id' => 'team_description',
                                'placeholder' => 'Enter team description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="team_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Faq Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('faq_title', null, [
                                'id' => 'faq_title',
                                'placeholder' => 'Enter faq title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="faq_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Faq Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('faq_description', null, [
                                'id' => 'faq_description',
                                'placeholder' => 'Enter faq description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="faq_description_error"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Blog Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('blog_title', null, [
                                'id' => 'blog_title',
                                'placeholder' => 'Enter blog title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="blog_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Blog Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('blog_description', null, [
                                'id' => 'blog_description',
                                'placeholder' => 'Enter blog description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="blog_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Newslater Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('newslater_title', null, [
                                'id' => 'newslater_title',
                                'placeholder' => 'Enter newslater title',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="newslater_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Newslater Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('newslater_description', null, [
                                'id' => 'newslater_description',
                                'placeholder' => 'Enter newslater description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="newslater_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Call to Action Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('calltoaction_title', null, [
                                'id' => 'calltoaction_title',
                                'placeholder' => 'Enter calltoaction title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="calltoaction_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Call to Action
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('calltoaction_description', null, [
                                'id' => 'calltoaction_description',
                                'placeholder' => 'Enter calltoaction description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="calltoaction_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Get in Touch title</label>
                        <div class="col-sm-9">
                            {!! Form::text('git_title', null, [
                                'id' => 'git_title',
                                'placeholder' => 'Enter git title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="git_title_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Get in Touch
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('git_description', null, [
                                'id' => 'git_description',
                                'placeholder' => 'Enter git description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="git_description_error"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('image', null, [
                                'id' => 'image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/heading/') }}/{{ $editdata->image }}" alt=""
                                    width="30%" height="30%" class="ab hide_image">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_image">Delete</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('title', null, [
                                'id' => 'title',
                                'placeholder' => 'Enter title',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="title_error"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label"> About Short
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('short_description', null, [
                                'id' => 'short_description ',
                                'placeholder' => 'Enter Description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="short_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label"> About Long
                            Description</label>
                        <div class="col-sm-9">
                            {!! Form::text('long_description', null, [
                                'id' => 'long_description',
                                'class' => 'form-control editor-tinymce',
                            ]) !!}
                            <span class="text-danger" id="long_description_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quote Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('quote_image', null, [
                                'id' => 'quote_image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/quote/') }}/{{ $editdata->quote_image }}" alt=""
                                    width="30%" height="30%" class="ab hide_imageqoute">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete_imagequote">Delete</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('home_image', null, [
                                'id' => 'home_image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/heading') }}/{{ $editdata->home_image }}" alt=""
                                    width="30%" height="30%" class="ab home_imagehide">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm home_imagedelete">Delete</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Faq Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('faq_image', null, [
                                'id' => 'faq_image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/heading') }}/{{ $editdata->faq_image }}" alt=""
                                    width="30%" height="30%" class="ab faq_imagehide">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm faq_imagedelete">Delete</a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Feature Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('feature_image', null, [
                                'id' => 'feature_image',
                                'class' => 'form-control',
                            ]) !!}
                            <div>
                                <img src="{{ asset('uploads/heading') }}/{{ $editdata->feature_image }}" alt=""
                                    width="30%" height="30%" class="ab feature_imagehide">
                            </div>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm feature_imagedelete">Delete</a>
                        </div>
                    </div>



                    {!! Form::submit('submit', ['class' => 'btn btn-primary', 'id' => 'saveBtn']) !!}

                    <a href="{{ route('admin') }}" class="btn btn-danger">Cancle</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        $(".delete_image").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.image') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '1') {

                        $('.hide_image').hide();
                        $('.delete_image').hide();

                    }
                }
            });

        });

        $(".delete_imagequote").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.image_quote') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '2') {

                        $('.hide_imageqoute').hide();
                        $('.delete_imagequote').hide();

                    }
                }
            });
        });

        $(".home_imagedelete").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.home_image') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '3') {

                        $('.home_imagehide').hide();
                        $('.home_imagedelete').hide();

                    }
                }
            });

        });

        $(".faq_imagedelete").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.faq_image') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '4') {

                        $('.faq_imagehide').hide();
                        $('.faq_imagedelete').hide();

                    }
                }
            });

        });

        $(".feature_imagedelete").click(function() {

            $.ajax({
                type: 'POST',
                url: "{{ route('delete.feature_image') }}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.status == '5') {

                        $('.feature_imagehide').hide();
                        $('.feature_imagedelete').hide();

                    }
                }
            });

        });
    </script>
@endsection
