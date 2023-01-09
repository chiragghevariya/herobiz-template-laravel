@extends('admin.layout')
@section('content')
    <div>
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a>
            </li>
        </ul>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Managed Blog </h1>
                <hr>
                <div class="">
                    <a href="{{ route('blog.create') }}" class="btn btn-info  btn-rounded btn-fw mdi mdi-plus">Add New</a>
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Categories</th>
                                <th>Tag</th>
                                <th>Status</th>
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
            responsive: false,
            "scrollX": true,

            ajax: {
                url: '{!! route('blog.anydata') !!}',
                data: function(d) {

                }
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'image'
                },
                {
                    data: 'title'
                },
                {
                    data: 'date'
                },
                {
                    data: 'name'
                },
                {
                    data: 'categories_id'
                },
                {
                    data: 'tag_id'
                },

                {
                    data: 'status'
                },
                {
                    data: 'action'
                },
            ]
        });

        $(document).ready(function() {

            $(document).on("click", "#active_inactive", function() {

                swal({
                        title: "Are you sure want to change status?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var status = $(this).attr('status');
                            var id = $(this).attr('data-id');
                            var cur = $(this);
                            $.ajax({
                                type: "POST",
                                url: "{{ route('blog.Singlestatuschange') }}",
                                data: {
                                    "status": status,
                                    "id": id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(data) {
                                    if (data.status == 0) {
                                        cur.removeClass('btn-success');
                                        cur.addClass('btn-danger');
                                        cur.text(
                                            'Inactive');
                                    } else {
                                        cur.removeClass('btn-danger');
                                        cur.addClass('btn-success');
                                        cur.text('Active');
                                    }
                                }
                            })
                            swal("Success! status has been successfully changed!", {
                                icon: "success",
                            });
                        }
                    });
            })
        });
    </script>
@endsection
