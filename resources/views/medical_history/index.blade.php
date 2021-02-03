@extends('layouts.app2')

@section('style')
<style>
    .modal { overflow: auto !important; }
</style>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Medical History</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Medical History</li>
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
                                                <th>Employee Code</th>
                                                <th>Employee Name</th>
                                                <th>Date</th>
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
                <h4 class="modal-title">Medical Encoding</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_form">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            
                            <div class="col-md-12">
                                            
                                <label for="">Employee Name</label>
                                <div class="input-group mb-3">
                                    <!-- /btn-group -->
                                    
                                    <input type="hidden" id="user_id" name="user_id">
                                    <input type="text" class="form-control" id="employee_name" placeholder="Employee Name" disabled name="employee_name">
                                    
                                    <div class="input-group-prepend">
                                        <a data-toggle="modal" data-target="#employee_modal" class="btn btn-primary">SEARCH</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <legend>Nature of Visit</legend>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> INJURY
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> ILLNESS
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> OTHER
                                </label>
                            </div>
                        </div> 
                        <hr>
                        <div class="row">
                            <legend>Reason for Visit</legend>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> ALLERGY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> ASTHMA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> BRUISE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> BURN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> COLD/COUGH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> CRUMPS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> CUT/SCRAPE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> DENTAL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> INSECT BITE
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> EARACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> EYE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> FEVER
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> HEADACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> HEAD INJURY
                                    </label>
                                </div> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> INSECT BITE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> VOMITING
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> HEADACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> HEAD INJURY
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-4">
                               
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> VOMITING
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> NOSE BLEED
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> FRACTURE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> RASH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> SORETHROAT
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> SPLINTER
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> STOMACH ACHE
                                    </label>
                                </div>
                            </div>
                        </div>   
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <legend>Treatment</legend>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> EMS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> CLEANSED WOUND
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> APPLIED BANDAGE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> ICE APPLIED/ COLD COMPRESS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> MEDICATION GIVEN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> WARM COMPRESS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> RESTED IN OFFICE
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                  <label for="">OBSERVATION/ ADDITIONAL INFORMATION</label>
                                  <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                  <label for="">INTRUCTIONS</label>
                                  <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
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

    <div class="modal fade" id="employee_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">        
                    <table id="datatable_emp" class="table" style="width: 100%" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th>Employee Code</th>
                                <th>Fullname</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

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
                "url": '{{ route('medical-hiostories.find-all-history') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
                { "data": "date" },
                { "data": "status" },
                { "data": "actions" },
            ],
            "columnDefs": [
                { "orderable": false, "targets": [ 1 ] }, 
            ]	 	 
        });

        $('#datatable_emp').DataTable({
            "ajax":{
                "url": '{{ route('employee.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ 
                    _token: "{{csrf_token()}}",
                    module:'modal'
                }
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
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
    
    const select = (id, name) => {
        $('#user_id').val(id);
        $('#employee_name').val(name);
        
        $("#employee_modal").removeClass("in");
        $(".modal-backdrop").remove();
        $("#employee_modal").modal("hide");
    }

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


</script>    
@endsection