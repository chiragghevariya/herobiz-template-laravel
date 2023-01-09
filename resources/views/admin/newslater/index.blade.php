@extends('admin.layout')
@section('content')

<div>
    <ul class="ab">
        <li class="ab">
          <i class="mdi mdi-home"></i>  <a href="{{ route('admin') }}">Home</a>
        </li>
    </ul>
</div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Managed Newslater </h1>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Email</th>
                                <th>Acion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var oTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            responsive: true,
            ajax: {
                url: '{!! route('newslater.anydata') !!}',
                data: function(d) {

                }
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'email'
                },
                {
                    data: 'action'
                },
            ]
        });
    </script>
@endsection
