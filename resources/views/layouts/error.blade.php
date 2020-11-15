@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="padding:100px 0 100px 0">
                    <div class="col-md-12 text-center">
                        <div class="card  card-body text-center">
                            <img style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 50%;" src="{{ asset('images/6TyoaxMkc.jpg') }}">
                            <h4>{{ $messages }}</h4>
                            <div align="center">
                                <p style="width:100%;text-align:center">{!! $description ?? '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
      <!-- /.content -->
    </div>
@endsection