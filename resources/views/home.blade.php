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
                <div class="col-6">
                  <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          Global Covid 19 Cases (  COVID 19 Epidemiology  )
                        </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                <h3 id="cases_global">00</h3>
                
                                <p>COVID 19 Cases</p>
                              </div>
                              <div class="icon">
                                <i class="ion-ios-people"></i>
                              </div>
                              <a href="#" class="small-box-footer">( <span id="today_case_global">00</span> + today cases)</a> 
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box " style="background-color: gray">
                              <div class="inner">
                                <h3 id="death_global">00</h3>
                
                                <p>Total Deaths</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-sad"></i>
                              </div>
                              <a href="#" class="small-box-footer">( <span id="today_death_global">00</span> + today deaths)</a> 
                            </div>
                          </div>

                          <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3 id="recovered_global">00</h3>
                
                                <p>Total Recovered</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-happy"></i>
                              </div>
                              <a href="#" class="small-box-footer">( <span id="today_recovered_global">00</span> + today recovered)</a> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">
                        Philippines Covid Cases (   COVID 19 Epidemiology  )
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3 id="cases">00</h3>
              
                              <p>COVID 19 Cases</p>
                            </div>
                            <div class="icon">
                              <i class="ion-ios-people"></i>
                            </div>
                            <a href="#" class="small-box-footer">( <span id="today_case">00</span> + today cases)</a> 
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                          <!-- small box -->
                          <div class="small-box " style="background-color: gray">
                            <div class="inner">
                              <h3 id="death">00</h3>
              
                              <p>Total Deaths</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-sad"></i>
                            </div>
                            <a href="#" class="small-box-footer">( <span id="today_death">00</span> + today deaths)</a> 
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                            <div class="inner">
                              <h3 id="recovered">00</h3>
              
                              <p>Recovered Cases</p>
                            </div>
                            <div class="icon">
                              <i class="ion-ios-people"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3 id="active">00</h3>
              
                              <p>Active Cases</p>
                            </div>
                            <div class="icon">
                              <i class="ion-ios-people"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Philippines COVID 19 Epidemiology ( Pie Chart )</h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                  </div>
            
                </div>
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
          url: 'https://coronavirus-19-api.herokuapp.com/countries/philippines',
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            active = data.cases;
            death = data.deaths;
            active = data.active;

            jQuery({ Counter: 0 }).animate({ Counter: data.cases }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#cases').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
            
            jQuery({ Counter: 0 }).animate({ Counter: data.todayCases }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#taday_case').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.deaths }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#death').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.todayDeaths }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#today_death').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.recovered }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#recovered').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
            
            jQuery({ Counter: 0 }).animate({ Counter: data.active }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#active').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            var donutData        = {
              labels: [
                  'Active Cases',
                  'Deaths',
                  'Recovered Cases',
              ],
              datasets: [
                {
                  data: [data.active,data.deaths,data.recovered],
                  backgroundColor : ['#ff0000', '#3d5c5c', '#00a65a'],
                }
              ]
            }

            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData        = donutData;
            var pieOptions     = {
              maintainAspectRatio : false,
              responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
              type: 'pie',
              data: pieData,
              options: pieOptions
            })

          }
      });

      $.ajax({
          url: 'https://coronavirus-19-api.herokuapp.com/countries/world',
          type: "GET",
          dataType: "JSON",
          success: function (data) {
            jQuery({ Counter: 0 }).animate({ Counter: data.cases }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#cases_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
            
            jQuery({ Counter: 0 }).animate({ Counter: data.todayCases }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#today_case_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.deaths }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#death_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.todayDeaths }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#today_death_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });

            jQuery({ Counter: 0 }).animate({ Counter: data.recovered }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $('#recovered_global').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                }
            });
          }
      });
    });

    
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>    
@endsection