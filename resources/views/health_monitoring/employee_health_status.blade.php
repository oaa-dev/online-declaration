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
                            <div class="table-responsive">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="datatable" class="table" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Employee Code</th>
                                            <th>Fullname</th>
                                            <th>Contact</th>
                                            <th>Risk</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Employee Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="active_form" method="POST" action="{{ route('monitoring.store_active') }}">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Date Confirmed</label>
                            <input type="hidden" id="user_id" name="user_id">
                            <input type="hidden" id="type" name="type">
                            <input type="date" class="form-control" id="date_confirmed" name="date_confirmed">
                        </div>
                        <div>
                            <a class="btn btn-primary btn-sm float-right" id="btn_suspected">Add new Suspected</a>
                            <label> Suspected Person </label>
                            <table class="table" id="tbl_suspected">
                                <tr>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><a class="btn btn-danger btn-sm"><i class="fa fa-times" ></i></a></td>
                                </tr>
                            </table>
                            <hr/>
                        </div>
                        <div class="form-group">
                            <label>Reports</label>
                            <textarea class="form-control" id="reports" rows="6" name="reports"></textarea>
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
                    <table id="datatable_employee" class="table" style="width: 100%" role="grid" aria-describedby="example2_info">
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
                { "data": "contact" },
                { "data": "risk" },
                { "data": "actions" },
            ],
            "columnDefs": [
                { "orderable": false, "targets": [ 1 ] }, 
            ]	 	 
        });

        
    });

    $('#btn_suspected').on('click', function(){

        $('#employee_modal').modal('show');

        $('#datatable_employee').DataTable().clear().destroy();
        datatable = $('#datatable_employee').DataTable({
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

    // $("#active_form").validate({
    //     rules: {
    //         date_confirmed: {
    //             required: true
    //         },
    //         patient_code: {
    //             required: true
    //         }
    //     },
    //     submitHandler: function (form) {
    //         Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, Delete it!'
    //         }).then((result) => {
    //             if (result.value) {
    //                 $.ajax({
    //                     url: '{{ route('monitoring.store_active') }}',
    //                     type: "POST",
    //                     data: $('#active_form').serialize(),
    //                     dataType: "JSON",
    //                     success: function (data) {
    //                         if (data.success) {
    //                             $('#active_modal').modal('hide');
    //                             $("#active_form")[0].reset();
    //                             swal.fire({
    //                                 title: "Success!",
    //                                 text: data.messages,
    //                                 icon: "success"
    //                             })
    //                             datatable.ajax.reload( null, false );
    //                         } else {
    //                             toastr.error(data.messages)
    //                         }
    //                     },
    //                     error: function (jqXHR, textStatus, errorThrown) {
    //                         toastr.error(errorThrown)
    //                     }
    //                 });    
    //             }
    //         });
    //     }
    // });

    
    $('#tbl_suspected tbody').on("click", "#remove_schedule", function(e){ 
        e.preventDefault();
        $(this).parent().parent().remove();

        const suspected_list = $("input[name='user_id_list[]']").map(function(){return $(this).val();}).get();
        if(suspected_list.length == 0){
            $('#tbl_suspected').append(`<tr>
                <td><input type="text" class="form-control"></td>
                <td><input type="text" class="form-control"></td>
                <td><a class="btn btn-danger btn-sm"><i class="fa fa-times" ></i></a></td>
            </tr>`);
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
                            $('#user_id').val(id);
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

    
    const suspected = (id) => {
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
                            $('#user_id').val(id);
                            $('#type').val('SUSPECTED');
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

    
    const select = (id, name, contact) => {
   
        if($('#user_id').val() == id){
            swal.fire({
                title: "Warning!",
                text: 'Cannot add your self as Suspected!',
                icon: "warning"
            })
            return false;
        }

        const exist = check_status(id);
        if(!(jQuery.isEmptyObject(exist))){
            console.log(exist);
            swal.fire({
                title: "Warning!",
                text: 'This user is already a '+ exist.health_status_remarks +' person!' ,
                icon: "warning"
            })

            return false;
        }
        
     
        const suspected_list = $("input[name='user_id_list[]']").map(function(){return $(this).val();}).get();
        if(suspected_list.length == 0){
            $('#tbl_suspected tbody').empty();
        }


        const id_exist = suspected_list.find(data => { return data == id; });
        if(!id_exist){
            $('#tbl_suspected').append(`<tr>
                <td><input type="text" class="form-control" value="${name}"><input type="hidden" value="${id}" name="user_id_list[]"></td>
                <td><input type="text" class="form-control" value="${contact}"></td>
                <td><a class="btn btn-danger btn-sm" id="remove_schedule"><i class="fa fa-times" ></i></a></td>
            </tr>`);

            swal.fire({
                title: "Success!",
                text: 'Employee add successfully',
                icon: "success"
            })
        }else{
            swal.fire({
                title: "Warning!",
                text: 'Employee already added!',
                icon: "warning"
            })
        }
    }

    const check_status = (id)=> {
        let response;
        $.ajax({
            url: '/covid_patient/'+id,
            type: "GET",
            async: false,  
            dataType: "JSON",
            success: function (data) {
                response = data;
            },
        }); 

        return response;
    }


</script>    
@endsection