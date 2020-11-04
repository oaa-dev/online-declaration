@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employee Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Employee Management</li>
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
                                    <i class="fa fa-plus"></i> Create New Employee
                                </button>
                        </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="datatable" class="table" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Employee Code</th>
                                            <th>Fullname</th>
                                            <th>Contact</th>
                                            <th>Address</th>
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
                <h4 class="modal-title">Create New Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_form">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" class="form-control" placeholder="Enter Lastname" id="lastname" name="lastname">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" class="form-control" placeholder="Enter Firstname" id="firstname" name="firstname">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Middlename</label>
                                <input type="text" class="form-control" placeholder="Enter Middlename" id="middlename" name="middlename">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Suffix</label>
                                <input type="text" class="form-control" placeholder="Enter Suffix" id="suffix" name="suffix">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" placeholder="Enter Date of Birth"  id="dateofbirth" name="dateofbirth">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control"  id="gender" name="gender">
                                    <option value="0" selected disabled>Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Civil Status</label>
                                <select class="form-control"  id="civilstatus" name="civil_status">
                                    <option value="0" selected disabled>Select Civil Status</option>
                                    <option value="1">Single</option>
                                    <option value="2">Married</option>
                                    <option value="3">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employee Code</label>
                                <input type="text" class="form-control" placeholder="Enter Employee Code" id="employee_code" name="employee_code">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter Email Address"  id="email" name="email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" placeholder="Enter Contact Number"  id="contact" name="contact">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3"  id="address" name="address"></textarea>
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
                <h4 class="modal-title">Update Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="update_form">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="hidden"id="edit_id" name="edit_id">
                                <input type="text" class="form-control" placeholder="Enter Lastname" id="edit_lastname" name="edit_lastname">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" class="form-control" placeholder="Enter Firstname" id="edit_firstname" name="edit_firstname">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Middlename</label>
                                <input type="text" class="form-control" placeholder="Enter Middlename" id="edit_middlename" name="edit_middlename">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Suffix</label>
                                <input type="text" class="form-control" placeholder="Enter Suffix" id="edit_suffix" name="edit_suffix">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" placeholder="Enter Date of Birth"  id="edit_dateofbirth" name="edit_dateofbirth">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control"  id="edit_gender" name="edit_gender">
                                    <option value="0" selected disabled>Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Civil Status</label>
                                <select class="form-control"  id="edit_civilstatus" name="edit_civil_status">
                                    <option value="0" selected disabled>Select Civil Status</option>
                                    <option value="1">Single</option>
                                    <option value="2">Married</option>
                                    <option value="3">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Employee Code</label>
                                <input type="text" class="form-control" placeholder="Enter Employee Code"  id="edit_employeecode" name="edit_employee_code">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" disabled placeholder="Enter Email Address"  id="edit_email" name="edit_email">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" disabled placeholder="Enter Contact Number"  id="edit_contact" name="edit_contact">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3"  id="edit_address" name="edit_address"></textarea>
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
            // "processing": false,
            // "serverSide": true,
            "ajax":{
                "url": '{{ route('employee.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
                { "data": "contact" },
                { "data": "address" },
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
            firstname: {
                minlength: 2,
                required: true
            },
            lastname: {
                minlength: 2,
                required: true
            },
            dateofbirth: {
                required: true
            },
            gender: {
                required: true
            },
            civilstatus: {
                required: true
            },
            address: {
                required: true
            },
            contact: {
                required: true
            },
            email: {
                required: true
            },
            employee_code: {
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
            confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '{{ route('employee.store') }}',
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

    const edit = (id) => {
        $.ajax({
            url: '/employee/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

                console.log(data);
                $("#update_modal").modal("show");
                $("#edit_id").val(data[0].id);
                $("#edit_lastname").val(data[0].lastname);
                $("#edit_firstname").val(data[0].firstname);
                $("#edit_middlename").val(data[0].middlename);
                $("#edit_suffix").val(data[0].suffix);
                $("#edit_dateofbirth").val(data[0].date_of_birth);
                $("#edit_gender").val(data[0].gender);
                $("#edit_civilstatus").val(data[0].civil_status);
                $("#edit_employeecode").val(data[0].employee_code);
                $("#edit_email").val(data[0].user.email);
                $("#edit_contact").val(data[0].user.contact_number);
                $("#edit_address").val(data[0].address);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }

    $("#update_form").validate({
        rules: {
            edit_firstname: {
                minlength: 2,
                required: true
            },
            edit_lastname: {
                minlength: 2,
                required: true
            },
            edit_dateofbirth: {
                required: true
            },
            edit_gender: {
                required: true
            },
            edit_civilstatus: {
                required: true
            },
            edit_address: {
                required: true
            },
            edit_contact: {
                required: true
            },
            edit_email: {
                required: true
            },
            edit_employee_code: {
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
            confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/employee/'+ $('#edit_id').val(),
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url : '/employee/toggle/'+id,
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
                    }
                });
            }
        });
    }


</script>    
@endsection