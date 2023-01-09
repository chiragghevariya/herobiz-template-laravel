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
                <li class="ab">
                    <a href="{{ route('portfolio.index') }}">Portfolio Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit Portfolio
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
        "></i>
            </li>
            <li class="ab">
                <a href="{{ route('portfolio.index') }}">Portfolio Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add Portfolio
            </li>

        </ul>
    @endif


    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Portfolio
                    @else
                        Add Portfolio
                    @endif

                    <hr>

                    <p class="card-description">Portfolio info</p>

                    @if (isset($editdata))
                        {{ Form::model($editdata, [
                            'id' => 'portfolio',
                            'class' => 'FromSubmit form-horizontal',
                            'data-redirect_url' => route('portfolio.index'),
                            'url' => route('portfolio.update', Crypt::encrypt($editdata->id)),
                            'method' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @else
                        {{ Form::open([
                            'id' => 'portfolio',
                            'class' => 'FromSubmit form-horizontal',
                            'url' => route('portfolio.store'),
                            'data-redirect_url' => route('portfolio.index'),
                            'name' => 'portfolio',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @endif

                    @csrf


                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('image', null, [
                                'id' => 'image',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="image_error"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="name_error"></span>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
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
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Long Description </label>
                        <div class="col-sm-9">

                            {!! Form::textarea('long_description', null, [
                                'id' => 'long_description',
                                'class' => 'form-control editor-tinymce',
                            ]) !!}

                            <span class="text-danger" id="long_description_error"></span>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, [
                                'id' => 'status',
                                'placeholder' => 'select status',
                                'class' => 'form-control',
                            ]) !!}

                            <span class="text-danger" id="status_error"></span>

                        </div>
                    </div>

                    {!! Form::submit('submit', ['class' => 'btn btn-primary', 'id' => 'saveBtn']) !!}

                    <a href="{{ route('portfolio.index') }}" class="btn btn-danger">Cancle</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
