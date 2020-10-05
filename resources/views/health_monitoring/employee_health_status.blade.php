@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employee Health Status</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="datatable" class="table" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Employee Code</th>
                                            <th>Fullname</th>
                                            <th>Risk Type</th>
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
                "url": '{{ route('monitoring.find-all-health-status') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
                { "data": "risk" },
                { "data": "status" },
                { "data": "actions" },
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
            confirmButtonText: 'Yes, Delete it!'
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