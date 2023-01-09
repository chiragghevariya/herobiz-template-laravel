@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record"></i>
                </li>
                <li class="ab">
                    <a href="{{ route('team.index') }}">Team Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit Team
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record "></i>
            </li>
            <li class="ab">
                <a href="{{ route('team.index') }}">Team Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add Team
            </li>

        </ul>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Team
                    @else
                        Add Team
                    @endif

                    <hr>

                    <p class="card-description">Team info</p>

                    @if (isset($editdata))
                        {{ Form::model($editdata, [
                            'id' => 'team',
                            'class' => 'FromSubmit form-horizontal',
                            'data-redirect_url' => route('team.index'),
                            'url' => route('team.update', Crypt::encrypt($editdata->id)),
                            'method' => 'post',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @else
                        {{ Form::open([
                            'id' => 'team',
                            'class' => 'FromSubmit form-horizontal',
                            'url' => route('team.store'),
                            'data-redirect_url' => route('team.index'),
                            'name' => 'team',
                            'enctype' => 'multipart/form-data',
                        ]) }}
                    @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            {!! Form::text('description', null, [
                                'id' => 'description',
                                'placeholder' => 'Enter Description',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="description_error"></span>
                        </div>
                    </div>

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
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Position </label>
                        <div class="col-sm-9">
                            {!! Form::text('position', null, [
                                'id' => 'position',
                                'placeholder' => 'Enter position',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="position_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Twitter Link </label>
                        <div class="col-sm-9">
                            {!! Form::url('t_link', null, [
                                'id' => 't_link',
                                'placeholder' => 'Enter t_link',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="t_link_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Facebook Link </label>
                        <div class="col-sm-9">
                            {!! Form::url('f_link', null, [
                                'id' => 'f_link',
                                'placeholder' => 'Enter f_link',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="f_link_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Instagram Link </label>
                        <div class="col-sm-9">
                            {!! Form::url('i_link', null, [
                                'id' => 'i_link',
                                'placeholder' => 'Enter i_link',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="i_link_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Linkdin Link </label>
                        <div class="col-sm-9">
                            {!! Form::url('l_link', null, [
                                'id' => 'l_link',
                                'placeholder' => 'Enter l_link',
                                'class' => 'form-control',
                            ]) !!}
                            <span class="text-danger" id="l_link_error"></span>
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

                    <a href="{{ route('team.index') }}" class="btn btn-danger">Cancle</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
