@php
  $company = \App\CompanyProfile::first();

  $profile = \App\Employee::findOrFail(\Auth::user()->employee_id); 

  $access = \Auth::user()->access;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Health Declaration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
  @yield('style')
  <style>
    .swal2-popup {
      font-size: 0.7rem !important;
    }
		#fakeloader-overlay {
			opacity: 0;
			top: 0px;
			left: 0px;
			position: fixed;
			background-color: rgba(0, 0, 0, 0.3);
			height: 100%;
			width: 100%;
			z-index: 9998;
			-webkit-transition: opacity 0.2s linear;
			-moz-transition: opacity 0.2s linear;
			transition: opacity 0.2s linear; 
		}

		#fakeloader-overlay.visible {
			opacity: 1;
		}

		#fakeloader-overlay.hidden {
			opacity: 0;
			height: 0px;
			width: 0px;
			z-index: -10000; 
		}

		#fakeloader-overlay .loader-wrapper-outer {
			background-color: transparent;
			z-index: 9999;
			margin: auto;
			width: 100%;
			height: 100%;
			overflow: hidden;
			display: table;
			text-align: center;
			vertical-align: middle; 
		}

		#fakeloader-overlay .loader-wrapper-inner {
			display: table-cell;
			vertical-align: middle; 
		}

		#fakeloader-overlay .loader {
			margin: auto;
			font-size: 10px;
			position: relative;
			text-indent: -9999em;
			border-top: 8px solid rgba(255, 255, 255, 0.5);
			border-right: 8px solid rgba(255, 255, 255, 0.5);
			border-bottom: 8px solid rgba(255, 255, 255, 0.5);
			border-left: 8px solid #AAA;
			-webkit-transform: translateZ(0);
			-ms-transform: translateZ(0);
			transform: translateZ(0);
			-webkit-animation: fakeloader 1.1s infinite linear;
			animation: fakeloader 1.1s infinite linear; 
		}

		#fakeloader-overlay .loader, #fakeloader-overlay .loader:after {
			border-radius: 50%;
			width: 80px;
			height: 80px; 
		}

		@-webkit-keyframes fakeloader {
			0% {
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg); 
			}

			100% {
				-webkit-transform: rotate(360deg);
				transform: rotate(360deg); 
		} 
		}

		@keyframes fakeloader {
			0% {
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg); 
			}

			100% {
				-webkit-transform: rotate(360deg);
				transform: rotate(360deg); 
			} 
		}

  </style>
   @laravelPWA
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" id="number" aria-expanded="true">
          <i class="fa fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;" id="notifications">       
          <a href="/monitoring/health-status" class="dropdown-item dropdown-footer">See All</a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">SETTING</span>
          <div class="dropdown-divider"></div>
          <a href="/employee/profile" class="dropdown-item">
            <i class="fa fa-user mr-2"></i>User Profile
          </a>
          <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
            <button type="submit" class="dropdown-item">
                <i class="fa fa-lock mr-2"></i> Logout
            </button>
        </form>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-navy">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="{{ asset('images/'. $company['logo'] )}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" class="brand-text font-weight-light">{{ $company['company_name'] }}</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ $profile['lastname'].', '. $profile['firstname'] .' '. $profile['middlename'][0].'.' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGEMENTS</li>

          @if($access == '1')
            <li class="nav-item">
              <a href="/employee" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Employee Management
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/emergency-hotline" class="nav-link">
                <i class="nav-icon fa fa-phone-alt"></i>
                <p>
                  Emergency Hotlines
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/monitoring/encoding" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  Declaration Encoding
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/monitoring/health-status" class="nav-link">
                <i class="nav-icon fa fa-user-tie"></i>
                <p>
                  Employee Health Status
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/covid_patient" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>
                  Patient Health Status
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/monitoring/health-history" class="nav-link">
                <i class="nav-icon fa fa-stethoscope"></i>
                <p>
                  Declaration History
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/reports/positive" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Positive Cases</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/reports/suspected" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Suspected Cases</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/reports/recovered" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recovered Cases</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/reports/deceased" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Deceased Cases</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">SETTING</li>
{{--             
            <li class="nav-item">
              <a href="/monitoring/health-history" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                  Activity Logs
                </p>
              </a>
            </li> --}}
            
            <li class="nav-item">
              <a href="/company/create" class="nav-link">
                <i class="nav-icon fa fa-building"></i>
                <p>
                  Company Profiles
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/schedules" class="nav-link">
                <i class="nav-icon fa fa-clock"></i>
                <p>
                  Shifting Schedules
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/threshold" class="nav-link">
                <i class="nav-icon fa fa-arrow-up"></i>
                <p>
                  Questions Threshold
                </p>
              </a>
            </li>
          @endif

          @if($access == '2')
            <li class="nav-item">
              <a href="/monitoring/encoding" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  Declaration Encoding
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="/emergency-hotline/list" class="nav-link">
                <i class="nav-icon fa fa-phone-alt"></i>
                <p>
                  Emergency Hotlines
                </p>
              </a>
            </li>
            @if(!empty(\App\EmployeeCovidStatus::where('user_id', '=', \Auth::user()->id)->where('status', '=', '1')->first()))
              <li class="nav-item">
                <a href="/covid_monitoring/create" class="nav-link">
                  <i class="nav-icon fa fa-user-plus"></i>
                  <p>
                    Patient Health Montrg
                  </p>
                </a>
              </li>
            @endif

            <li class="nav-item">
              <a href="/monitoring/health-history" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>
                  Health Status History
                </p>
              </a>
            </li>
            
            <li class="nav-header">SETTING</li>
            
            <li class="nav-item">
              <a href="/employee/profile" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  My Profile
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <form method="POST" id="myform" action="{{ route('logout') }}">
                @csrf
                  <a href="#" onclick="document.getElementById('myform').submit()" class="nav-link">
                    <i class="nav-icon fa fa-cogs"></i>
                    <p>
                      Logout
                    </p>
                  </a>
              </form>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    {{-- <strong>Copyright &copy; 2020
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<div id="fakeloader-overlay" class="visible incoming">
  <div class="loader-wrapper-outer">
  <div class="loader-wrapper-inner">
    {{-- <div class="loader"></div> --}}
    <img height="100px" src="{{asset('adminlte/plugins/loading-default.gif')}}">
  </div>
  </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jquery.validate.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jquery.datatables.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>



<script src="{{asset('adminlte/plugins/bootstrap-fileinput/js/plugins/piexif.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap-fileinput/js/plugins/popper.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('adminlte/plugins/sweetalert2.js')}}"></script>
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
<!-- Toastr -->
<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@yield('script')

<script type="text/javascript">
  $(window).on('load', function(){
    
    notification();

    setTimeout(function(){
      $( "#fakeloader-overlay" ).fadeOut(300, function() {
        $( "#fakeloader-overlay" ).remove();  
      });  
    }, 1000);
  });

  const notification = () => {
    $.ajax({
      url:'/monitoring/getAllHighRisk',
      type:'GET',
      success:function(response){
        console.log(response.length);

        response.forEach(data => {
          
          $('#number').append(`<span class="badge badge-danger navbar-badge">${response.length}</span>`);
          $('#notifications').empty();
          $('#notifications').append(` <a href="/monitoring/health-status" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('adminlte/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    ${data.fullname}
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">This Employee is High Risk!</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ${data.date}</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
          <div class="dropdown-divider"></div>`)
        });

        $('#notifications').append(`<a href="/monitoring/health-status" class="dropdown-item dropdown-footer">See All</a>`);
      }
    })
  }

  // setInterval(() => {
    // notification();
  // }, 10000);
</script>
</body>
</html>
