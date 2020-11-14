@extends('layouts.app2')
@section('style')
    
  <!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
  <!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
      wish to resize images before upload. This must be loaded before fileinput.min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/piexif.min.js" type="text/javascript"></script>
  <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
      This must be loaded before fileinput.min.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/plugins/sortable.min.js" type="text/javascript"></script>
  <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
    3.3.x versions without popper.min.js. -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
      dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- the main fileinput plugin file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.min.js"></script>
  <!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.js"></script>
@endsection

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
                                <form id="create_form" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div class="row col-12 text-center">
                                                <div class="kv-avatar-hint">
                                                    <small><b>Note:</b> Select file < 1500 KB</small> 
                                                </div>
                                                <div class="kv-avatar">
                                                    <div class="file-loading">
                                                        <input id="input-id" type="file" name="logo" id="logo" class="file" data-preview-file-type="text" >
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row col-12">
                                                <img style=" margin:50px; padding:20px; border: 1px solid" src="/images/{{ !empty($company['logo'])? $company['logo'] : '' }}" alt="">
                                            </div> --}}
                                                
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="">Company Name</label>
                                                <input type="text" class="form-control" value="{{ !empty($company['company_name'])? $company['company_name'] : '' }}" name="company" id="company" placeholder="Company Name">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Email Address</label>
                                                        <input type="text" class="form-control" value="{{ !empty($company['email'])? $company['email'] : '' }}" name="email" id="email" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Contact Number</label>
                                                        <input type="text" class="form-control" value="{{ !empty($company['contact_number'])? $company['contact_number'] : '' }}" name="contact" id="contact" placeholder="Contact Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Company Description</label>
                                                <textarea class="form-control" name="description" value="{{ !empty($company['description'])? $company['description'] : '' }}" id="description" placeholder="Description" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Company Address</label>
                                                <textarea class="form-control" name="address" id="address" placeholder="Address" rows="3">{{ !empty($company['address'])? $company['address'] : '' }}</textarea>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Mission</label>
                                                        <textarea class="form-control" name="mission" id="mission" placeholder="Mission" rows="3">{{ !empty($company['mission'])? $company['mission'] : '' }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Vision</label>
                                                        <textarea class="form-control" name="vision" id="vision" placeholder="Vision" rows="3">{{ !empty($company['vision'])? $company['vision'] : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>&nbsp;
                                                <button type="submit" class="btn btn-primary">Save changes</button>
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
@endsection


@section('script')
<script>
    let datatable = [];
    $(document).ready(function(){
        $("#input-id").fileinput("destroy");
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
            }
        },
        submitHandler: function (form) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save it!'
            }).then((result) => {
                if (result.value) {
                    
                    var formData = new FormData($("#create_form").get(0));
                    $.ajax({
                        url: '{{ route('company.store') }}',
                        type: "POST",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        success: function (data) {
                            if (data.success) {
                                $("#create_form")[0].reset();
                                swal.fire({
                                    title: "Success!",
                                    text: data.messages,
                                    icon: "success"
                                })
                                location.reload();
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
</script>    
@endsection