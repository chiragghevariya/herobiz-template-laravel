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
                <h1 class="card-title"> Managed CMS </h1>
                <hr>
                <div class="table-responsive">
                    <a href="{{ route('cms.create') }}" class="btn btn-info  btn-rounded btn-fw mdi mdi-plus">Add New</a>
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Sub_title</th>
                                <th>Decription</th>
                                <th>Long Decription</th>
                                <th>status</th>
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
                url: '{!! route('cms.anydata') !!}',
                data: function(d) {

                }
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'title'
                },
                {
                    data: 'sub_title'
                },
                {
                    data: 'description'
                },
                {
                    data: 'long_description'
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
                    url: "{{ route('cms.Singlestatuschange') }}",
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


$(document).on("click",".delete",function(){


var myUrl = $(this).attr('data-link');

$.ajax({
    type: 'DELETE',
    url: myUrl,
    data: {
        "_token": "{{ csrf_token() }}"
    },
    success:  function(response) {
        if (response.status == 0 && response.msg != "") {

            oTable.draw();

        }
    }

});
});


    </script>
@endsection
