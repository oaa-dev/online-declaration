@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Company Profiles</h1>
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
                            <form id="create_form">
                                <div class="form-group">
                                  <label for="">Company Name</label>
                                  <input type="text" class="form-control" name="" id="" placeholder="COmpany Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Company Description</label>
                                    <input type="text" class="form-control" name="" id="" placeholder="Company address">
                                </div>
                                <div class="form-group">
                                    <label for="">Company Address</label>
                                    <input type="text" class="form-control" name="" id="" placeholder="Company address">
                                </div>

                            </form>
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
                <h4 class="modal-title">Create New Emergency Hotlines</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_form">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
                    </div>
                
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Contact" id="contact" name="contact">
                    </div>
                
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter email address" id="email" name="email">
                    </div>
                
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3"  id="description" name="description"></textarea>
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
                "url": '{{ route('hotline.find-all') }}',
                "dataType": "json",
                "type": "POST",
                "data":{ _token: "{{csrf_token()}}"}
            },
            "columns": [
                { "data": "name" },
                { "data": "contact" },
                { "data": "email" },
                { "data": "description" },
                { "data": "status" },
                { "data": "actions" },
            ],
            "columnDefs": [
                { "orderable": false, "targets": [ 1 ] }, 
            ]	 	 
        });
    });
</script>    
@endsection