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
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div class="kv-avatar-hint">
                                                <small><b>Note:</b> Select file < 1500 KB</small> 
                                            </div>
                                            <div class="kv-avatar">
                                                <div class="file-loading">
                                                    <input id="input-id" type="file" name="logo" id="logo" class="file" data-preview-file-type="text" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Company Name</label>
                                                <input type="text" class="form-control" name="company" id="company" placeholder="Company Name">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Email Address</label>
                                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Contact Number</label>
                                                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Company Description</label>
                                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Company Address</label>
                                                <textarea class="form-control" name="address" id="address" placeholder="Address" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Mission</label>
                                                        <textarea class="form-control" name="mission" id="mission" placeholder="Mission" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Vision</label>
                                                        <textarea class="form-control" name="vission" id="vission" placeholder="Vision" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
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
    $(document).ready(function(){
        $("#input-id").fileinput("destroy");
        $("#input-id").fileinput({
            overwriteInitial: true,
            showClose: false,
            showCaption: false,
            showUpload: false,
            showBrowse:false,
            browseLabel: 'Update',
            removeLabel: 'Remove',
            browseIcon: '<i class="ti-folder"></i>',
            removeIcon: '<i class="ti-close"></i>',
            defaultPreviewContent: '<img src="../../images/' + data.userData.image +'" alt="Your Avatar">',
            allowedFileExtensions: ["jpg","png"]
        });
    });

    
    $("#create_form").validate({
        rules: {
            company: {
                minlength: 3,
                required: true
            },
            description: {
                required: true
            },
            email: {
                required: true
            },
            contact: {
                required: true
            },
            address: {
                required: true
            },
            // mission: {
            //     required: true
            // },
            // vision: {
            //     required: true
            // },
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
                        url: '{{ route('company.store') }}',
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
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "danger"
                                })
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            swal.fire({
                                title: "Success!",
                                text: errorThrown,
                                icon: "danger"
                            })
                        }
                    });    
                }
            });
        }
    });
</script>    
@endsection