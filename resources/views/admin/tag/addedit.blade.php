@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record"></i>
                </li>
                <li class="ab">
                    <a href="{{ route('tag.index') }}">Tag Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit Tag
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record "></i>
            </li>
            <li class="ab">
                <a href="{{ route('tag.index') }}">Tag Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add Tag
            </li>

        </ul>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Tag
                    @else
                        Add Tag
                    @endif

                    <hr>

                    <p class="card-description">Tag info</p>

                    @if (isset($editdata))
                        {{ Form::model($editdata, [
                            'id' => 'tag',
                            'class' => 'FromSubmit form-horizontal',
                            'data-redirect_url' => route('tag.index'),
                            'url' => route('tag.update', Crypt::encrypt($editdata->id)),
                            'method' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @else
                        {{ Form::open([
                            'id' => 'tag',
                            'class' => 'FromSubmit form-horizontal',
                            'url' => route('tag.store'),
                            'data-redirect_url' => route('tag.index'),
                            'name' => 'tag',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @endif

                    @csrf

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

                    <a href="{{ route('tag.index') }}" class="btn btn-danger">Cancle</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
