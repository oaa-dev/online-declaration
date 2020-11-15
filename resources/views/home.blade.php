@extends('layouts.app2')

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">COVID 19 Epidemiology</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                          Company Covid 19 Cases (  COVID 19 Epidemiology  )
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3 id="cases_global">00</h3>
                
                                <p>COVID 19 Positive Cases</p>
                              </div>
                              <div class="icon">
                                <i class="ion-ios-people"></i>
                              </div>
                              {{-- <a href="#" class="small-box-footer">( <span id="today_case_global">00</span> + today cases)</a>  --}}
                            </div>
                          </div>
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3 id="cases">00</h3>
                
                                <p>Total Active Cases</p>
                              </div>
                              <div class="icon">
                                <i class="ion-ios-people"></i>
                              </div>
                              {{-- <a href="#" class="small-box-footer">( <span id="today_recovered_global">00</span> + today recovered)</a>  --}}
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box " style="background-color: gray">
                              <div class="inner">
                                <h3 id="death_global">00</h3>
                
                                <p>Total Deaths</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-sad"></i>
                              </div>
                              {{-- <a href="#" class="small-box-footer">( <span id="today_death_global">00</span> + today deaths)</a>  --}}
                            </div>
                          </div>

                          <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3 id="recovered_global">00</h3>
                
                                <p>Total Recovered</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-happy"></i>
                              </div>
                              {{-- <a href="#" class="small-box-footer">( <span id="today_recovered_global">00</span> + today recovered)</a>  --}}
                            </div>
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

<!-- FLOT CHARTS -->
<script src="{{ asset('adminlte/plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('adminlte/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('adminlte/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    let datatable = [];
    let active = 0;
    let death = 0;
    let recovered = 0;
    $(document).ready(function(){
      $.ajax({
          url: '/covid_patient/statistics',
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            jQuery({ Counter: 0 }).animate({ Counter: data.positive }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#cases_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
            

            jQuery({ Counter: 0 }).animate({ Counter: data.deceased }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#death_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.recovered }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#recovered_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
            
            jQuery({ Counter: 0 }).animate({ Counter: data.active }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#cases').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
          }
      });
    });

</script>    
@endsection