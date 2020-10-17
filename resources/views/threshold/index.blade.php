@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 offset-4">
                    <div class="card">
                        <div class="card-header">
                            Health Questions Threshold
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="create_threshold">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <select class="form-control" name="threshold">
                                      <option @php echo ($level == '1')?'selected':''; @endphp value="1">1</option>
                                      <option @php echo ($level == '2')?'selected':''; @endphp value="2">2</option>
                                      <option @php echo ($level == '3')?'selected':''; @endphp value="3">3</option>
                                      <option @php echo ($level == '4')?'selected':''; @endphp value="4">4</option>
                                      <option @php echo ($level == '5')?'selected':''; @endphp value="5">5</option>
                                      <option @php echo ($level == '6')?'selected':''; @endphp value="6">6</option>
                                      <option @php echo ($level == '7')?'selected':''; @endphp value="7">7</option>
                                      <option @php echo ($level == '8')?'selected':''; @endphp value="8">8</option>
                                      <option @php echo ($level == '9')?'selected':''; @endphp value="9">9</option>
                                      <option @php echo ($level == '10')?'selected':''; @endphp value="10">10</option>
                                      <option @php echo ($level == '11')?'selected':''; @endphp value="11">11</option>
                                    </select>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Save</button>
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

    $("#create_threshold").validate({
        rules: {
            threshold : {
                required: true
            },
        },
        submitHandler: function (form) {
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
                                                url: '/threshold/1',
                                                type: "POST",
                                                data: $('#create_threshold').serialize(),
                                                dataType: "JSON",
                                                success: function (data) {
                                                    if (data.success) {
                                                        $("#create_threshold")[0].reset();
                                                        Swal.fire({
                                                            title: "Success!",
                                                            text: data.messages,
                                                            icon: "success"
                                                        });
                                                        
                                                        location.reload();
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
    });

</script>    
@endsection