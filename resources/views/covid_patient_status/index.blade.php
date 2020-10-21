@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Covid Patient Health Status</h1>
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
                            <div class="table-responsive">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <table id="datatable" class="table" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Employee Code</th>
                                                <th>Fullname</th>
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

    <div class="modal fade" id="active_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Employee Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="active_form">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Date Confirmed</label>
                            <input type="hidden" id="covid_id" name="covid_id">
                            <input type="hidden" id="type" name="type">
                            <input type="date" class="form-control" id="date_confirmed" name="date_confirmed">
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
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script>
    let datatable = [];
    $(document).ready(function(){
        datatable = $('#datatable').DataTable({
            // "processing": false,
            // "serverSide": true,
            "ajax":{
                "url": '{{ route('covid_patient.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
                { "data": "contact" },
                { "data": "status" },
                { "data": "actions" },
            ],
            "columnDefs": [
                { "orderable": false, "targets": [ 1 ] }, 
            ],
            dom: 'Brtip',
            buttons: [
                {
                    extend: 'print',
                    text:'PRINT',
                    exportOptions: {
                    columns: [ 0, 1, 2, 3 ] //Your Column value those you want
                }
                },
                    {
                    extend: 'excel',
                    text:'EXPORT EXCEL',
                    exportOptions: {
                    columns: [ 0, 1, 2, 3 ] //Your Column value those you want
                    }
                },
            ],
        });

        
    });

    $("#active_form").validate({
        rules: {
            date_confirmed: {
                required: true
            },
            patient_code: {
                required: true
            }
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
                        url: '{{ route('covid_patient.store') }}',
                        type: "POST",
                        data: $('#active_form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            if (data.success) {
                                $('#active_modal').modal('hide');
                                $("#active_form")[0].reset();
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

    const positive = (id) => {
        swal.fire({
            title: 'Please enter password!',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function (password) {
                $.ajax({
                    url:'{{ route('monitoring.verify-password')}}',
                    type:'POST',
                    data:{ _token:"{{ csrf_token() }}",password:password},
                    dataType:'json',
                    success:function(success){
                        if(success.success){
                            $('#covid_id').val(id);
                            $('#type').val('POSITIVE');
                            $('#active_modal').modal('show');
                            //process loader false
                        }else{
                            swal.fire({
                                title: "Password do not match!",
                                text: "Please input correct password",
                                icon: "error"
                            })
                            //process loader false
                        }
                    }
                }); 
                    
            },
            allowOutsideClick: false
        })
    }
    
    const get_better = (id) => {
        swal.fire({
            title: 'Please enter password!',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function (password) {
                $.ajax({
                    url:'{{ route('monitoring.verify-password')}}',
                    type:'POST',
                    data:{ _token:"{{ csrf_token() }}",password:password},
                    dataType:'json',
                    success:function(success){
                        if(success.success){
                            $('#covid_id').val(id);
                            $('#type').val('GET BETTER');
                            $('#active_modal').modal('show');
                        }else{
                            swal.fire({
                                title: "Password do not match!",
                                text: "Please input correct password",
                                icon: "error"
                            })
                            //process loader false
                        }
                    }
                }); 
                    
            },
            allowOutsideClick: false
        })
    }
    
    const deceased = (id) => {
        swal.fire({
            title: 'Please enter password!',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function (password) {
                $.ajax({
                    url:'{{ route('monitoring.verify-password')}}',
                    type:'POST',
                    data:{ _token:"{{ csrf_token() }}",password:password},
                    dataType:'json',
                    success:function(success){
                        if(success.success){
                            $('#covid_id').val(id);
                            $('#type').val('DECEASED');
                            $('#active_modal').modal('show');
                        }else{
                            swal.fire({
                                title: "Password do not match!",
                                text: "Please input correct password",
                                icon: "error"
                            })
                            //process loader false
                        }
                    }
                }); 
                    
            },
            allowOutsideClick: false
        })
    }
    
    const recovered = (id) => {
        swal.fire({
            title: 'Please enter password!',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function (password) {
                $.ajax({
                    url:'{{ route('monitoring.verify-password')}}',
                    type:'POST',
                    data:{ _token:"{{ csrf_token() }}",password:password},
                    dataType:'json',
                    success:function(success){
                        if(success.success){
                            $('#covid_id').val(id);
                            $('#type').val('RECOVERED');
                            $('#active_modal').modal('show');
                        }else{
                            swal.fire({
                                title: "Password do not match!",
                                text: "Please input correct password",
                                icon: "error"
                            })
                            //process loader false
                        }
                    }
                }); 
                    
            },
            allowOutsideClick: false
        })
    }


</script>    
@endsection