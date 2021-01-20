@extends('Layout.adminLayout')
@section('title')
    Admin|AddAgent
@endsection
@section('Content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Agent</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Agent</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
           <!-- form start -->
           @if($errors->any())
           <div class="alert alert-danger ">
            <ul>
              <li> {{$errors->first()}}</li>
            </ul>
           </div>
           @endif
             @if (\Session::has('success'))
              <div class="alert alert-success">
                 <ul>
                    <li>{!! \Session::get('success') !!}</li>
                    </ul>
              </div>
              @endif
        <form class="form-horizontal" method="POST" action="{{route('AddAgent')}}">
        <div class="row">
          <!-- left column -->
          @csrf
          <div class="col-md-8">


            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 >Agent Information </h3>
              </div>
              <!-- /.card-header -->


                <div class="card-body">
                  <div class="form-group row">
                        <label for="AgentName" class="col-sm-5 col-form-label">Agent Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="AgentName" placeholder="Agent Name">
                        </div>
                  </div>
                  <div class="form-group row">
                    <label for="AgentID" class="col-sm-5 col-form-label">Agent ID</label>
                    <div class="col-sm-10">
                      <input type="number" name="ID"class="form-control" id="AgentID" placeholder="Agent ID">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputAddress" class="col-sm-5 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" name="address"class="form-control" id="inputAddress" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Telephone" class="col-sm-5 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                      <input type="tel" name="telephone"class="form-control" id="Telephone" placeholder="Telephone">
                    </div>
                  </div>
                  </div>
                </div>

                <!-- /.card-body -->

                <!-- /.card-footer -->
          <div class="card-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info float-right">Add Agent</button>
           </div>
            </div>

            <!-- /.card -->





        </div>         <!-- /.row -->




    </form>
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
