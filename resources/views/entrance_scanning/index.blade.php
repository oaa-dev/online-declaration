@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile" id="profile" style="border: black solid 6px; height: 250px">

                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <label class="col-md-4">SEARCH :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="" id="search_by_empCode" autofocus placeholder="Enter Employee code" style="width: 100%">
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <label class="col-md-4">EMPLOYEE CODE :</label>
                                            <div class="col-md-8">
                                                <label id="employee_code"> --- </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4">NAME :</label>
                                            <div class="col-md-8">
                                                <label id="name"> ---</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-4">CONTACT :</label>
                                            <div class="col-md-8">
                                                <label id="contact"> ---</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4">ACCESS :</label>
                                            <div class="col-md-8">
                                                <label id="access"> ---</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <label class="col-md-4">ADDRESS :</label>
                                            <div class="col-md-8">
                                                <label id="address"> ---</label>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                    
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" style="width: 100%">
                                            <tr>
                                                <th>Signs/Symptoms</th>
                                                <th>Status</th>
                                            </tr>
                                            <tr>
                                                <td>Fever</td>
                                                <td><label class="label label-primary" id="fever">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Cough</td>
                                                <td><label class="label label-primary" id="cough">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Shortness of Breathing</td>
                                                <td><label class="label label-primary" id="breathing">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Sore Throat</td>
                                                <td><label class="label label-primary" id="throat">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Headache</td>
                                                <td><label class="label label-primary" id="headache">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Body Pain</td>
                                                <td><label class="label label-primary" id="bodypain">-</label></td>
                                            </tr>
                                        </table>

                                        <table class="table table-bordered" style="width: 100%">
                                            <tr>
                                                <th>Person List</th>
                                                <th>Status</th>
                                            </tr>
                                            <tr>
                                                <td>Relative/Hosehold member with positive symptoms?</td>
                                                <td><label class="label label-primary" id="relative">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Person diagnosed with corona virus disease?</td>
                                                <td><label class="label label-primary" id="diagnose">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Person Under Monitoring/Investigation?</td>
                                                <td><label class="label label-primary" id="pui">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Living with frontliners?</td>
                                                <td><label class="label label-primary" id="frontliners">-</label></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Relative who just arrived from Overseas?</td>
                                                <td><label class="label label-primary" id="overseas">-</label></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    $(document).ready(function(){
        $('#search_by_empCode').on('change', function(){
            $.ajax({
                url:'/monitoring/show_monitoring_by_emp_code/'+$(this).val(),
                type:'GET',
                dataType:'JSON',
                success:function(response){
                    if(response.success){
                        $('#employee_code').text(response.messages.employee_code);
                        $('#contact').text(response.messages.contact_number);
                        $('#name').text(response.messages.lastname+', '+response.messages.lastname+' '+response.messages.middlename);
                        $('#address').text(response.messages.address);
                        if(response.messages.access == '1'){
                            $('#access').text('ADMIN');
                        }else{
                            $('#access').text('EMPLOYEE');
                        }
                        
                        $('#fever').html(response.messages.fever == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#cough').html(response.messages.cough == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#breathing').html(response.messages.shortness_of_breathing == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#throat').html(response.messages.sore_throat == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#headache').html(response.messages.headache == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#bodypain').html(response.messages.body_pain == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        
                        $('#relative').html(response.messages.household_member_positive == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#diagnose').html(response.messages.person_diagnosed_positive == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#pui').html(response.messages.person_monitor == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#frontliners').html(response.messages.living_with_frontliners == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#overseas').html(response.messages.relative_arrived_overseas == "YES" ? '<span class="badge bg-danger">YES</span>':'<span class="badge bg-primary">NO</span>');
                        $('#profile').html(response.messages.qrcode);
                    }else{
                        $('#employee_code').text('---');
                        $('#contact').text('---');
                        $('#name').text('---');
                        $('#address').text('---');
                        $('#access').text('---');
                        
                        $('#fever').text('-');
                        $('#cough').text('-');
                        $('#breathing').text('-');
                        $('#throat').text('-');
                        $('#headache').text('-');
                        $('#bodypain').text('-');
                        
                        $('#relative').text('-');
                        $('#diagnose').text('-');
                        $('#pui').text('-');
                        $('#frontliners').text('-');
                        $('#overseas').text('-');
                        $('#profile').empty();

                        toastr.error(response.messages);
                    }
                }
            })
        })
    });
</script>
@endsection
