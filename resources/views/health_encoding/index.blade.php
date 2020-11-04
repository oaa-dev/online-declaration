@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Daily Health Monitoring Form</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form id="create_form">
                        @csrf
                        @method('POST')
                        <div class="col-12">
                            
                            <div class="callout callout-info">
                                <h5></h5>
            
                                <p>To prevent the spread of covid 19 virus and reduce the potential risk of exposure
                                    to our employees,  we are conducting a simple screening questionaire. Your participation
                                    is important to help us take precautionary measures to protect you and everyone in this company.</p>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                            <label for="">Temperature</label>
                                            <input type="number" class="form-control" name="temperature" id="temperature" placeholder="Degrees Celsius">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            
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
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">Shifting Schedule</label>
                                                <select class="form-control" name="shifting_list" id="shifting_list">
                                                    <option disabled value="" selected>Select Schedule</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Have you Experience any of the following symptons?
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Signs/Symptoms</th>
                                            <th>Yes</th>
                                            <th>No</th>
                                        </tr>
                                        <tr>
                                            <td>Fever</td>
                                            <td><input type="radio" name="fever" value="YES"></td>
                                            <td><input type="radio" name="fever" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Cough</td>
                                            <td><input type="radio" name="cough" value="YES"></td>
                                            <td><input type="radio" name="cough" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Shortness of Breathing</td>
                                            <td><input type="radio" name="breath" value="YES"></td>
                                            <td><input type="radio" name="breath" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Sore Throat</td>
                                            <td><input type="radio" name="sore_throat" value="YES"></td>
                                            <td><input type="radio" name="sore_throat" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Headache</td>
                                            <td><input type="radio" name="headache" value="YES"></td>
                                            <td><input type="radio" name="headache" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Body Pain</td>
                                            <td><input type="radio" name="body_pain" value="YES"></td>
                                            <td><input type="radio" name="body_pain" value="NO"></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Have you had close contact with the person below?
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Person List</th>
                                            <th>Yes</th>
                                            <th>No</th>
                                        </tr>
                                        <tr>
                                            <td>Relative/Hosehold member with positive symptoms?</td>
                                            <td><input type="radio" name="household_with_symptoms" value="YES"></td>
                                            <td><input type="radio" name="household_with_symptoms" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Person diagnosed with corona virus disease?</td>
                                            <td><input type="radio" name="person_with_disease" value="YES"></td>
                                            <td><input type="radio" name="person_with_disease" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Person Under Monitoring/Investigation?</td>
                                            <td><input type="radio" name="person_monitor" value="YES"></td>
                                            <td><input type="radio" name="person_monitor" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Living with frontliners?</td>
                                            <td><input type="radio" name="living_frontliners" value="YES"></td>
                                            <td><input type="radio" name="living_frontliners" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Relative who just arrived from Overseas?</td>
                                            <td><input type="radio" name="relative_overseas" value="YES"></td>
                                            <td><input type="radio" name="relative_overseas" value="NO"></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            
                            <div class="callout callout-info">
                                <h5></h5>
                                <p>
                                    <input type="checkbox" style="zoom: 1.5" id="i_agree"> I declare all the above information to be true and correct. By submitting this declaration form
                                    i agree to collect, use and disclosure of my personal information above by health declaration of
                                    employee for the purpose of a precautionary measures against COVID 19 in the copany premises.</p>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <button type="submit" disabled id="declare" class="btn btn-primary pull-right">Declare Health Status</button>
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                                <!-- /.card-header -->
                            </div>


                        <!-- /.card -->
                        </div>
                    </form>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
      <!-- /.content -->
    </div>

    
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
                    <table id="datatable" class="table" style="width: 100%" role="grid" aria-describedby="example2_info">
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

@endsection


@section('script')
<script>
    let datatable = [];
    let Toast = '';
    $(document).ready(function(){
        $.ajax({
            url:'{{ route('schedules.all') }}',
            type:'GET',
            dataType:'JSON',
            success:function(response){
                response.forEach(data => {
                    $('#shifting_list').append(`<option value="${data.id}">${data.description} (${data.in}-${data.out})</option>`)
                });
            }
        })


        datatable = $('#datatable').DataTable({
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

    $('#i_agree').change(function() {
        if($(this).is(":checked")) {
            $('#declare').prop('disabled', false);
        }else{
            $('#declare').prop('disabled', true);
        }
    });

    const select = (id, name) => {
        $('#user_id').val(id);
        $('#employee_name').val(name);
        
        $("#employee_modal").removeClass("in");
        $(".modal-backdrop").remove();
        $("#employee_modal").modal("hide");
    }

    $("#create_form").validate({
        rules: {
            employee_name: {
                required: true
            },
            temperature: {
                required: true
            },
            shifting_list: {
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
                        url: '{{ route('monitoring.store') }}',
                        type: "POST",
                        data: $('#create_form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            $("#create_form")[0].reset();
                            if (data.success) {
                                swal.fire({
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "success"
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