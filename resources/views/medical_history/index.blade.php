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
                                <i class="fa fa-plus"></i> Create New
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
                            <div class="col-md-5">
                                <legend>Nature of Visit</legend>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nature_of_visit[]" value="INJURY"> INJURY
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nature_of_visit[]" value="ILLNESS"> ILLNESS
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nature_of_visit[]" value="OTHER"> OTHER
                                    </label>
                                </div>
                                <label for="nature_of_visit[]" class="error"></label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="">Temperature</label>
                                  <input type="number" class="form-control" name="temperature" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Blood Pressure</label>
                                    <input type="text" class="form-control" name="blood_pressure" placeholder="">
                                </div>
                            </div>
                        </div> 
                        <hr>
                        <div class="row">
                            <legend>Reason for Visit</legend>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="ALLERGY"> ALLERGY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="ASTHMA"> ASTHMA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="BRUISE"> BRUISE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="BURN"> BURN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="COLD/COUGH"> COLD/COUGH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="CRUMPS"> CRUMPS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="CUT/SCRAPE"> CUT/SCRAPE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="DENTAL"> DENTAL
                                    </label>
                                </div>
                                <label for="reason_for_visit[]" class="error"></label>
                            </div>

                            <div class="col-md-4">

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="EARACHE"> EARACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="EYE"> EYE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="FEVER"> FEVER
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="HEADACHE"> HEADACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="HEAD INJURY"> HEAD INJURY
                                    </label>
                                </div> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="INSECT BITE"> INSECT BITE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="VOMITING"> VOMITING
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="NOSE BLEED"> NOSE BLEED
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="INSECT BITE"> INSECT BITE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="FRACTURE"> FRACTURE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="RASH"> RASH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="SORETHROAT"> SORETHROAT
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="SPLINTER"> SPLINTER
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="STOMACH ACHE"> STOMACH ACHE
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
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="CLEANSED WOUND"> CLEANSED WOUND
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="APPLIED BANDAGE"> APPLIED BANDAGE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="ICE APPLIED/ COLD COMPRESS"> ICE APPLIED/ COLD COMPRESS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="MEDICATION GIVEN"> MEDICATION GIVEN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="WARM COMPRESS"> WARM COMPRESS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="RESTED IN OFFICE"> RESTED IN OFFICE
                                    </label>
                                </div>
                                <label for="treatment[]" class="error"></label>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                  <label for="">OBSERVATION/ ADDITIONAL INFORMATION</label>
                                  <textarea class="form-control" name="observation" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                  <label for="">INTRUCTIONS</label>
                                  <textarea class="form-control" name="instruction" rows="3"></textarea>
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
                    <h4 class="modal-title">Update Medical Records</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
            <form id="update_form">
                @csrf
                @method('PUT')
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5">
                                <legend>Nature of Visit</legend>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nature_of_visit[]" value="INJURY"> INJURY
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nature_of_visit[]" value="ILLNESS"> ILLNESS
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nature_of_visit[]" value="OTHER"> OTHER
                                    </label>
                                </div>
                                <label for="nature_of_visit[]" class="error"></label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label for="">Temperature</label>
                                  <input type="number" class="form-control" name="temperature" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Blood Pressure</label>
                                    <input type="text" class="form-control" name="blood_pressure" placeholder="">
                                </div>
                            </div>
                        </div> 
                        <hr>
                        <div class="row">
                            <legend>Reason for Visit</legend>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="ALLERGY"> ALLERGY
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="ASTHMA"> ASTHMA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="BRUISE"> BRUISE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="BURN"> BURN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="COLD/COUGH"> COLD/COUGH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="CRUMPS"> CRUMPS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="CUT/SCRAPE"> CUT/SCRAPE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="DENTAL"> DENTAL
                                    </label>
                                </div>
                                <label for="reason_for_visit[]" class="error"></label>
                            </div>

                            <div class="col-md-4">

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="EARACHE"> EARACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="EYE"> EYE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="FEVER"> FEVER
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="HEADACHE"> HEADACHE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="HEAD INJURY"> HEAD INJURY
                                    </label>
                                </div> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="INSECT BITE"> INSECT BITE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="VOMITING"> VOMITING
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="NOSE BLEED"> NOSE BLEED
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="INSECT BITE"> INSECT BITE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="FRACTURE"> FRACTURE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="RASH"> RASH
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="SORETHROAT"> SORETHROAT
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="SPLINTER"> SPLINTER
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="reason_for_visit[]" value="STOMACH ACHE"> STOMACH ACHE
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
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="CLEANSED WOUND"> CLEANSED WOUND
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="APPLIED BANDAGE"> APPLIED BANDAGE
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="ICE APPLIED/ COLD COMPRESS"> ICE APPLIED/ COLD COMPRESS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="MEDICATION GIVEN"> MEDICATION GIVEN
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="WARM COMPRESS"> WARM COMPRESS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="treatment[]" value="RESTED IN OFFICE"> RESTED IN OFFICE
                                    </label>
                                </div>
                                <label for="treatment[]" class="error"></label>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 form-group">
                                  <label for="">OBSERVATION/ ADDITIONAL INFORMATION</label>
                                  <textarea class="form-control" name="observation" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                  <label for="">INTRUCTIONS</label>
                                  <textarea class="form-control" name="instruction" rows="3"></textarea>
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
            employee_name: {
                required: true
            },
            temperature: {
                required: true
            },
            blood_pressure: {
                required: true
            },
            "nature_of_visit[]": {
                required: true
            },
            "reason_for_visit[]": {
                required: true
            },
            "treatment[]": {
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
                        url: '{{ route('medical-histories.store') }}',
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
                                    title: "Error!",
                                    text: data.messages,
                                    icon: "danger"
                                })
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            swal.fire({
                                title: "Error!",
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

    const edit = (id, form_stat) => {

        if(form_stat == false){
            var form = document.getElementById("update_form");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = true;
            }
            $("#update_modal .modal-title").text('View Medical Records');
            $("#update_modal .modal-footer").hide();
        }else{
            var form = document.getElementById("update_form");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = false;
            }
            $("#update_modal .modal-title").text('Update Medical Records');
            $("#update_modal .modal-footer").show();
        }

        $("#update_form input[name='nature_of_visit[]']").prop('checked', false);
        $("#update_form input[name='reason_for_visit[]']").prop('checked', false);
        $("#update_form input[name='treatment[]']").prop('checked', false);
        $("#update_form textarea[name='observation']").val('');
        $("#update_form textarea[name='instruction']").val('');
        $("#update_form input[name='temperature']").val('');
        $("#update_form input[name='blood_pressure']").val('');

        $.ajax({
            url: '/medical-histories/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

                console.log(data);
                if(typeof(data.nature_of_visit) == 'string'){
                    $("#update_form input[name='nature_of_visit[]'][value='"+data.nature_of_visit+"']").prop('checked', true);
                }else{
                    data.nature_of_visit.forEach(data => {
                        $("#update_form input[name='nature_of_visit[]'][value='"+data+"']").prop('checked', true);
                    });
                }

                if(typeof(data.reason_for_visit) == 'string'){
                    $("#update_form input[name='reason_for_visit[]'][value='"+data.reason_for_visit+"']").prop('checked', true);
                }else{
                    data.reason_for_visit.forEach(data => {
                        $("#update_form input[name='reason_for_visit[]'][value='"+data+"']").prop('checked', true);
                    });
                }
                
                if(typeof(data.treatment) == 'string'){
                    $("#update_form input[name='treatment[]'][value='"+data.treatment+"']").prop('checked', true);
                }else{
                    data.treatment.forEach(data => {
                        $("#update_form input[name='treatment[]'][value='"+data+"']").prop('checked', true);
                    });
                }

                
                $("#update_form textarea[name='observation']").val(data.additional_information);
                $("#update_form textarea[name='instruction']").val(data.instructions);
                $("#update_form input[name='temperature']").val(data.temperature);
                $("#update_form input[name='blood_pressure']").val(data.blood_pressure);
                $("#update_form input[name='edit_id']").val(data.id);



                $("#update_modal").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }

    $("#update_form").validate({
        rules: {
            employee_name: {
                required: true
            },
            temperature: {
                required: true
            },
            blood_pressure: {
                required: true
            },
            "nature_of_visit[]": {
                required: true
            },
            "reason_for_visit[]": {
                required: true
            },
            "treatment[]": {
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
                        url: '/medical-histories/'+ $('#edit_id').val(),
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