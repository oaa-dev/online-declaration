@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Shifting Schedule Management</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_modal">
                                <i class="fa fa-plus"></i> Create New Shifting Schedule
                            </button>
                        </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="datatable" class="table" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Description</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
      <!-- /.content -->
    </div>

    
    <div class="modal fade" id="create_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Shifting Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="create_form">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" placeholder="Enter Name" id="description" name="description">
                        </div>
                    
                        <div class="form-group">
                            <label>Time In</label>
                            <input type="time" class="form-control" id="time_in" name="time_in">
                        </div>
                    
                        <div class="form-group">
                            <label>Time Out</label>
                            <input type="time" class="form-control" id="time_out" name="time_out">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Shifting Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update_form">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="hidden" id="edit_id" name="edit_id">
                            <input type="text" class="form-control" placeholder="Enter Name" id="edit_description" name="edit_description">
                        </div>
                    
                        <div class="form-group">
                            <label>Time In</label>
                            <input type="time" class="form-control" id="edit_time_in" name="edit_time_in">
                        </div>
                    
                        <div class="form-group">
                            <label>Time Out</label>
                            <input type="time" class="form-control" id="edit_time_out" name="edit_time_out">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection


@section('script')
<script>
    let datatable = [];
    $(document).ready(function(){
        datatable = $('#datatable').DataTable({
            "ajax":{
                "url": '{{ route('schedules.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "description" },
                { "data": "time_in" },
                { "data": "time_out" },
                { "data": "status" },
                { "data": "actions" },
            ],
            "columnDefs": [
                { "orderable": false, "targets": [ 1 ] }, 
            ]	 	 
        });
    });

    $("#create_form").validate({
        rules: {
            description : {
                required: true
            },
            time_in: {
                required: true
            },
            time_out: {
                required: true
            }
        },
        submitHandler: function (form) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ route('schedules.store') }}',
                        type: "POST",
                        data: $('#create_form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            if (data.success) {
                                $('#create_modal').modal('hide');
                                $("#create_form")[0].reset();
                                swal.fire({
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "success"
                                })
                                datatable.ajax.reload( null, false );
                            } else {
                                swal.fire({
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "danger"
                                })
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            swal.fire({
                                title: "Success!",
                                text: errorThrown,
                                icon: "danger"
                            })
                        }
                    });    
                }
            });
        }
    });

    const edit = (id) => {
        $.ajax({
            url: '/schedules/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $("#update_modal").modal("show");
                $("#edit_id").val(data.id);
                $("#edit_description").val(data.description);
                $("#edit_time_in").val(data.in);
                $("#edit_time_out").val(data.out);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }

    $("#update_form").validate({
        rules: {
            edit_description : {
                required: true
            },
            edit_time_in: {
                required: true
            },
            edit_time_out: {
                required: true
            }
        },
        submitHandler: function (form) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/schedules/'+ $('#edit_id').val(),
                        type: "POST",
                        data: $('#update_form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            if (data.success) {
                                $('#update_modal').modal('hide');
                                $("#update_form")[0].reset();
                                Swal.fire({
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "success"
                                })
                                datatable.ajax.reload( null, false );
                            } else {
                                toastr.error(data.messages)
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            toastr.error(errorThrown)
                        }
                    });
                }
            });
        }
    });

    const del = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icons: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url : '/schedules/toggle/'+id,
                    type: "POST",
                    data:{ _token: "{{csrf_token()}}"},
                    dataType: "JSON",
                    success: function(response)
                    { 
                        swal.fire({
                            title: "Success!",
                            text: response.messages,
                            icon: "success"
                        })
                        datatable.ajax.reload( null, false );
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal.fire({
                            title: "Oops! something went wrong.",
                            text: errorThrown,
                            icon: "error"
                        });
                        //process loader false
                        processObject.hideProcessLoader();
                    }
                });
            }
        });
    }


</script>    
@endsection