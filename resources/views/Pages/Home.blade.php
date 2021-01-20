@extends('Layout.siteLayout')
@section('title')
Home
@endsection
@section('Content')
<div >

    <!-- Main content -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="card bg-light col-md-12  " style=" height:100%">
            <div class="container-fluid">
            <div class="header">
              <h1 style="text-align: center ;font-size: 50px;padding-top: 1%;"><strong>The Contract</h1>
            </div>
              <div class="row">
               <div class="col-md-6">
             
                <div class="bg-light" style="text-align:center;padding-top: 1%; padding-bottom:2%">
                 <img src="https://logodix.com/logo/1707088.png"
                >
                  <h1><strong>Admin?</strong>Login please.</h1>
                  </div>
               </div> <!--/col left-->

               <div class="col-md-5" style="padding-top: 8%; padding-bottom:2%">
                <div class="card card-info" >
                 <form id="validation" method="POST" action="{{route('Logina')}}">
                  @csrf
                    <div class="card-body">
                      <!-- Date dd/mm/yyyy -->
                      <div class="form-group">
                        <label>Email:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                          </div>
                          <input type="email" class="form-control" name="email"  data-mask>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
      
                      <!-- Password -->
                      <div class="form-group">
                        <label>Password:</label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-lock"></i></span>
                          </div>
                          <input type="password" name="password"class="form-control"  >
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
      
      
      

       
      
                    </div>
                    <div class="card-footer" >
                      <span style=' color:red' >@if($errors->any())
                        {{$errors->first()}}
                        @endif</span>
                        <button type="submit" class="btn btn-info col-md-3 float-right">Sign in</button>
                    </div>
                    <!-- /.card-body -->
                 </form>
                  </div>
                  <!-- /.card -->
               </div>
              </div><!--/row-->
            </div><!--/small fluid-->
        </div><!--/card-->
     </div><!--/fluid-->
    </section><!--/content header-->

      </div><!--/content-->
    
    
    <!-- /.content -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap 4 -->


    <script src="{{asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection


<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>