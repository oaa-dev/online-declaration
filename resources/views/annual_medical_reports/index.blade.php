@extends('layouts.app2')

@section('style')
<style>
    .input{
        border: none;
        border-bottom: 1px solid black;
        background-color: white;
        width: 90%;
    }

    .input:focus {
        outline: none;
    }

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
                    <h1 class="m-0">Annual Medical Reports</h1>
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
                        <h3 class="card-title">Employee List
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
                                                <th>Fullname</th>
                                                <th>Address</th>
                                                <th>Contact</th>
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
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Annual Medical Report</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_form">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="user_id" name="user_id">
                            <input type="text" class="form-control" id="fullname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Diagnosis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="diagnosis">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">General Physical Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="" name="general_physical_desc" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Known Allergies</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="known_allergies" id="">
                        </div>
                    </div>
                    
                    <legend>Please fill information in for all areas that apply</legend>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Temperature</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="temperature" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Height</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="height" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Weight</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="weight" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Blood Pressure</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="blood_pressure" id="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Pulse</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="pulse" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Respiration</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="respiration" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Cholesterol</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="cholesterol" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Eye</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="eyes" id="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Nose</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nose" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Throat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="throat" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Ears</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="ears" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-12 col-form-label">Chest</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="chest" id="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Lungs</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="lungs" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-sm-4 col-form-label">Heart</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="heart" id="">
                            </div>
                        </div>
                    </div>

                    <div id="male_exam">
                        <legend>Male Screenings</legend>
    
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="" class="col-form-label">Prostate Specific Antigen</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="male_prostate_antigen" id="">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="" class="col-form-label">Genital Development</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="" name="male_genital">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="female_exam">
                        <legend>Female Screenings</legend>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Pap Smear</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="pap_smear" id="">
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Breast Exam</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="breast_exam" id="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Mammography</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="mammography" id="">
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="" class="col-form-label">Genital Development</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="female_genital" id="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <legend>Other Screening Test</legend>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Vision</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="vision" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Hearing</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="hearing" id="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Dental</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="dental" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Urinalysis</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="urinalysis" id="">
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Sigmoidoscopy</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="sigmoidoscopy" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Stool Occult Blood</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="stool_occult" id="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Colonoscopy</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="colonoscopy" id="">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Extremities</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="extremities" id="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="" class="col-form-label">Abdomen</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="abdomen" id="">
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
                "url": '{{ route('annual-medical-reports.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
                { "data": "address" },
                { "data": "contact" },
                { "data": "status" },
                { "data": "actions" },
            ],
            "columnDefs": [
                { "orderable": false, "targets": [ 1 ] }, 
            ]	 	 
        });

        $('#datatable_user').DataTable({
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
        rules: { },
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
                        url: '{{ route('annual-medical-reports.store') }}',
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
    
    const select = (id, name, gender) => {
        $('#user_id').val(id);
        $('#fullname').val(name);
        if(gender == '1'){
            $('#female_exam').hide();
            $('#male_exam').show();
        }else{
            $('#male_exam').hide();
            $('#female_exam').show();
        }
        $("#create_modal").modal("show");
    }

</script>    
@endsection