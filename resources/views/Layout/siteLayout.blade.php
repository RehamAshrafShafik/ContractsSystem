<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Contract | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body >
    
  <nav class="navbar navbar-expand-sm navbar-info navbar-dark" style="height: 8%">

    <!-- Links -->
    <ul class="navbar-nav">
    <li class="nav-item " style="width=15px">
        <!-- <img class="rounded-circle" style="overflow:fit" src={{asset('https://img2.pngio.com/contract-png-hd-contract-png-transparent-png-download-kindpng-contract-logo-png-860_800.png')}} style="position:relative; width:20%; height:300%; padding:0; margin-top:-2%"> -->
      

      <a href="#" class="navbar-brand">
            <img class="rounded-circle" src="https://img2.pngio.com/contract-png-hd-contract-png-transparent-png-download-kindpng-contract-logo-png-860_800.png" height="28" alt="CoolBrand" style="width:90px;height:55px;margin-left:20px;">
      </a>
      </li>
    
  
    </ul>
  
  </nav>
      
  <!-- Main Sidebar Container -->

@yield('Content')
    






    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block"> 
        
    <strong>Contract system.
  </div>
  </footer>
      
<!-- jQuery -->
<script src="css/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="css/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="css/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="css/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="css/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
    </body>