@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Profile</h1>
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
                        <form id="update_form">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="hidden"id="edit_id" name="edit_id">
                                        <input type="text" class="form-control" placeholder="Enter Lastname" id="edit_lastname" value="{{ $user['lastname'] }}" name="edit_lastname">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" placeholder="Enter Firstname" value="{{ $user['firstname'] }}" id="edit_firstname" name="edit_firstname">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Middlename</label>
                                            <input type="text" class="form-control" placeholder="Enter Middlename" value="{{ $user['middlename'] }}" id="edit_middlename" name="edit_middlename">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Suffix</label>
                                            <input type="text" class="form-control" placeholder="Enter Suffix" value="{{ $user['suffix'] }}" id="edit_suffix" name="edit_suffix">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" value="{{ $user['date_of_birth'] }}" placeholder="Enter Date of Birth"  id="edit_dateofbirth" name="edit_dateofbirth">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control"  id="edit_gender" name="edit_gender">
                                                <option value="0" disabled>Select Gender</option>
                                                <option {{ ($user['gender'] == '1')?'selected':'' }} value="1">Male</option>
                                                <option {{ ($user['gender'] == '2')?'selected':'' }} value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Civil Status</label>
                                            <select class="form-control"  id="edit_civilstatus" name="edit_civil_status">
                                                <option value="0" disabled>Select Civil Status</option>
                                                <option {{ ($user['civil_status'] == '1')?'selected':'' }} value="1">Single</option>
                                                <option {{ ($user['civil_status'] == '2')?'selected':'' }} value="2">Married</option>
                                                <option {{ ($user['civil_status'] == '3')?'selected':'' }} value="3">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employee Code</label>
                                            <input type="text" value="{{ $user['employee_code'] }}" class="form-control" placeholder="Enter Employee Code"  id="edit_employeecode" name="edit_employee_code">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" value="{{ $user['email'] }}" class="form-control" placeholder="Enter Email Address"  id="edit_email" name="edit_email">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" value="{{ $user['contact_number'] }}" class="form-control" placeholder="Enter Contact Number"  id="edit_contact" name="edit_contact">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="5"  id="edit_address" name="edit_address">{{ $user['address'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" placeholder="Enter new password"  id="new_password" name="new_password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control" placeholder="Enter old password"  id="old_password" name="old_password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-between">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            
                        </form>
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
            edit_email: {
                required: true
            },
            edit_contact: {
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/employee/edit-profile',
                        type: "POST",
                        data: $('#update_form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            if (data.success) {
                                Swal.fire({
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "success"
                                }).then(function(){
                                    location.reload();
                                })
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
</script>    
@endsection