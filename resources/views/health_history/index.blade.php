@extends('layouts.app2')
@section('style')
<style>
    td.details-control {
        background: url("{{ asset('adminlte/details_open.png')}}") no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url("{{ asset('adminlte/details_close.png')}}") no-repeat center center;
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
                <h1 class="m-0">Health Declaration History</h1>
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
                                                <th style="width: 20px"></th>
                                                <th>Fullname</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Schedule</th>
                                                <th>Temperature</th>
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
<script>
    let datatable = [];
    $(document).ready(function(){
        datatable = $('#datatable').DataTable({
            "ajax":{
                "url": '{{ route('monitoring.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "fullname" },
                { "data": "date" },
                { "data": "time" },
                { "data": "schedule" },
                { "data": "temperature" },
            ] 
        });

        $('#datatable tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = datatable.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    });

    function format ( d ) {
    // `d` is the original data object for the row
    return '<div class ="col-md-12">'+
        '<div class ="row">'+
            '<div class ="col-md-4">'+
                '<table class="table table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<th>SIGNS/SYMPTOMS</th>'+
                        '<th>ANSWER</th>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Cough:</td>'+
                        '<td>'+d.cough+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Fever:</td>'+
                        '<td>'+d.fever+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Shortness of Breathing:</td>'+
                        '<td>'+d.shortness_of_breathing+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Sore Throat:</td>'+
                        '<td>'+d.sore_throat+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Headache:</td>'+
                        '<td>'+d.headache+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Body Pain:</td>'+
                        '<td>'+d.body_pain+'</td>'+
                    '</tr>'+
                '</table>'+
            '</div>'+
            
            '<div class ="col-md-8">'+
                '<table class="table table-bordered" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<th>QUESTIONS</th>'+
                        '<th>ANSWER</th>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Relative/Hosehold member with positive symptoms?</td>'+
                        '<td>'+d.household_member_positive+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Person diagnosed with corona virus disease?</td>'+
                        '<td>'+d.person_diagnosed_positive+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Living with frontliners?</td>'+
                        '<td>'+d.living_with_frontliners+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Relative who just arrived from Overseas?</td>'+
                        '<td>'+d.relative_arrived_overseas+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Person Under Monitoring/Investigation?</td>'+
                        '<td>'+d.person_monitor+'</td>'+
                    '</tr>'+
                '</table>'+
            '</div>'+
        '</div>'+
    '</div>';
}

</script>    
@endsection