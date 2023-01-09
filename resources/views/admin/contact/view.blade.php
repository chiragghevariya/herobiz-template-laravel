@extends('admin.layout')
@section('content')

    <div>
        <ul class="ab">
            <li class="ab">
                <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
            </li>
            <li class="ab">
                <a href="{{ route('contact.index') }}">Contact Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                View Contact
            </li>

        </ul>
    </div>


    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    &nbsp;
                    View Contac
                </h4>
                <hr>

                <p class="card-description">Contact Info</p>

                @if (isset($editdata))
                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->name }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->email }}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Subject :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->subject }}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Message :-</label>
                        <div class="col-sm-9">
                            {{ $editdata->message }}

                        </div>
                    </div>
                @endif
                <a href="{{ route('contact.index') }}" class="btn btn-danger">Cancle</a>

            </div>
        </div>
    </div>

@endsection
