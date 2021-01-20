<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>The Contract | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables-->
  <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}" rel="stylesheet">
  <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js')}}"></script>
   <!--select-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('Home')}}" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Tables</a>
          </li> -->
        </ul>




      </nav>
      <!-- /.navbar -->





  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color:rgb(23, 162, 184)">
    <!-- Brand Logo -->
    <a href="{{route('Home')}}" class="brand-link">
      <img src="{{asset('css/dist/img/Logo.jpg')}}"
           alt=""
           class=" img-circle elevation-3 "
           style="opacity: .8">
      <span class="brand-text font-weight-light">Contract</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('css/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$adminn->UserName}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a {{Route::currentRouteNamed('AdHome') ? 'activee' : ''}}href="{{route('Home')}}" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>

                <p style="font-size: 140%" >Home</p>

            </a>

          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p style="font-size: 140%">
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item" >
              <a {{Route::currentRouteNamed('ConTable') ? 'activee' : ''}} href="{{route('ConTable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:white">Contracts</p>
                </a>
              </li>
              <li class="nav-item">
              <a {{Route::currentRouteNamed('CommTable') ? 'activee' : ''}} href="{{route('CommTable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:white">Commissions</p>
                </a>
              </li>
              <li class="nav-item">
              <a {{Route::currentRouteNamed('CommTable') ? 'activee' : ''}} href="{{route('BlockTable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:white">Blocks</p>
                </a>
              </li>
              <li class="nav-item">
              <a {{Route::currentRouteNamed('CommTable') ? 'activee' : ''}} href="{{route('ITable')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:white">Installments</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p style="font-size: 140%">
                Account
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item" >
              <a href="{{route('logout')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:white">Logout</p>
                </a>
              </li>
           
           
          

            </ul>
          </li>
       

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('Content')







    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">

    <strong>Copyright @Freeham Contract system.
  </div>
  </footer>



  <!-- bs-custom-file-input -->

  <script src="{{asset('css/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('css/dist/js/adminlte.min.js')}}"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('css/dist/js/demo.js')}}"></script>

  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  </script>
    </body>
