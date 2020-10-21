@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List of Deceased Employee</h1>
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
                                                <th>Patient Code</th>
                                                <th>Contact</th>
                                                <th>Address</th>
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
                "url": '{{ route('covid_patient.find-all-by-status') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}", status: 'DECEASED'}
            },
            "columns": [
                { "data": "employee_code" },
                { "data": "fullname" },
                { "data": "code" },
                { "data": "contact" },
                { "data": "address" },
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
                    columns: [ 0, 1, 2, 3, 4 ] //Your Column value those you want
                }
                },
                    {
                    extend: 'excel',
                    text:'EXPORT EXCEL',
                    exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ] //Your Column value those you want
                    }
                },
            ],
        });

        
    });


</script>    
@endsection