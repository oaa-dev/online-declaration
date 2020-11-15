@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0"> Patient Health Monitoring Form</h3>
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Temperature</label>
                                                <input type="number" class="form-control" name="temperature" id="temperature" placeholder="Degrees Celsius">
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
                                        
                                        <tr>
                                            <td>Colds</td>
                                            <td><input type="radio" name="colds" value="YES"></td>
                                            <td><input type="radio" name="colds" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Vomiting</td>
                                            <td><input type="radio" name="vomiting" value="YES"></td>
                                            <td><input type="radio" name="vomiting" value="NO"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Diarrhea</td>
                                            <td><input type="radio" name="diarrhea" value="YES"></td>
                                            <td><input type="radio" name="diarrhea" value="NO"></td>
                                        </tr>

                                        
                                        <tr>
                                            <td>Fatigue/Chill</td>
                                            <td><input type="radio" name="fatigue" value="YES"></td>
                                            <td><input type="radio" name="fatigue" value="NO"></td>
                                        </tr>

                                        <tr>
                                            <td>Joints Pain</td>
                                            <td><input type="radio" name="joint_pains" value="YES"></td>
                                            <td><input type="radio" name="joint_pains" value="NO"></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Other Symptoms</label>
                                            <textarea rows="3" name="other_symptoms" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Health Condition</label>
                                            <select class="form-control" name="condition">
                                                <option value="MONITORING">ON GOING</option>
                                                @if($health_status == 'POSITIVE')
                                                    <option value="RECOVERED">RECOVERED</option>
                                                @else
                                                    <option value="GET BETTER">GET BETTER</option>
                                                    <option value="POSITIVE">POSITIVE</option>
                                                @endif
                                                <option value="DECEASED">DECEASED</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Date Confirmed</label>
                                            <input type="date" class="form-control" name="date_confirmed">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Name of Informant</label>
                                            <input type="text" class="form-control" name="informant" id="informant" placeholder="Name of Informant">
                                             </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Relationship</label>
                                            <input type="text" class="form-control" name="relationship" id="relationship" placeholder="Relationship">
                                             </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="">Contact Number</label>
                                            <input type="text" class="form-control" name="contact" id="contact">
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                            </div>
                            
                            <div class="callout callout-info">
                                <h5></h5>
                                <p>
                                    <input type="checkbox" name="i_agree" style="zoom: 1.5" id="i_agree"> I declare all the above information to be true and correct. By submitting this declaration form
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

@endsection


@section('script')
<script>
    let datatable = [];
    let Toast = '';
    $(document).ready(function(){
    });

    $('#i_agree').change(function() {
        if($(this).is(":checked")) {
            $('#declare').prop('disabled', false);
        }else{
            $('#declare').prop('disabled', true);
        }
    });

    $("#create_form").validate({
        rules: {
            condition: {
                required: true
            },
            date_confirmed: {
                required: true
            },
            informant: {
                required: true
            },
            relationship: {
                required: true
            },
            contact: {
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
                        url: '{{ route('covid_monitoring.store') }}',
                        type: "POST",
                        data: $('#create_form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            $("#create_form")[0].reset();
                            $('#declare').prop('disabled', true);
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