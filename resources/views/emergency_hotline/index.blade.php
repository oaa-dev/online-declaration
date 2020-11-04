@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Emergency Hotlines Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Emergency Hotlines Management</li>
                </ol>
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
                                <i class="fa fa-plus"></i> Create New Hotlines
                            </button>
                        </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <table id="datatable" class="table" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Email Address</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
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
                <h4 class="modal-title">Create New Emergency Hotlines</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_form">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
                    </div>
                
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Contact" id="contact" name="contact">
                    </div>
                
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter email address" id="email" name="email">
                    </div>
                
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3"  id="description" name="description"></textarea>
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
                    <h4 class="modal-title">Update Emergency Hotlines</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update_form">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" id="edit_id" name="edit_id">
                            <input type="text" class="form-control" placeholder="Enter Name" id="edit_name" name="edit_name">
                        </div>
                    
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" placeholder="Enter Contact" id="edit_contact" name="edit_contact">
                        </div>
                    
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" placeholder="Enter email address" id="edit_email" name="edit_email">
                        </div>
                    
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3"  id="edit_description" name="edit_description"></textarea>
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
    let Toast = '';
    $(document).ready(function(){
        datatable = $('#datatable').DataTable({
            "ajax":{
                "url": '{{ route('hotline.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "name" },
                { "data": "contact" },
                { "data": "email" },
                { "data": "description" },
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
            name: {
                minlength: 3,
                required: true
            },
            contact: {
                required: true
            },
            email: {
                required: true
            },
            description: {
                required: true
            },
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
                        url: '{{ route('emergency-hotline.store') }}',
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
            url: '/emergency-hotline/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

                console.log(data);
                $("#update_modal").modal("show");
                $("#edit_id").val(data.id);
                $("#edit_name").val(data.name);
                $("#edit_contact").val(data.contact_number);
                $("#edit_email").val(data.email_address);
                $("#edit_description").val(data.description);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }

    $("#update_form").validate({
        rules: {
            edit_name: {
                minlength: 3,
                required: true
            },
            edit_contact: {
                required: true
            },
            edit_email: {
                required: true
            },
            edit_description: {
                required: true
            },
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
                        url: '/emergency-hotline/'+ $('#edit_id').val(),
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
                    url : '/emergency-hotline/toggle/'+id,
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