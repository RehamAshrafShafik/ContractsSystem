@extends('Layout.adminLayout')
@section('title')
    Admin|AddInstallment
@endsection
@section('Content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Installmet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Installment</li>
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
        <form class="form-horizontal" method="POST" action="{{route('AddIns')}}">
        <div class="row">
          <!-- left column -->
          @csrf
          <div class="col-md-12">


            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="">Installment details </h3>
              </div>
              <!-- /.card-header -->


                <div class="card-body ">
                    <div class="row">
                    <div class="col-md-6">
                  <div class="form-group row">
                        <label for="OwnerID" class="col-sm-5 col-form-label">OwnerID</label>
                        <div class="col-sm-10">
                            <select id="OwnerID" name="OwnerID" class="custom-select colorful-select"  placeholder="Owner ID" >
                                <option value=""></option>

                                @foreach ($client as $c)
                                <option value="{{$c->OwnerID}}">{{$c->OwnerID}}</option>

                                @endforeach

                              </select>                        </div>
                  </div>

                  <div class="form-group row">
                    <label for="InsNumber" class="col-sm-5 col-form-label">Installment number</label>
                    <div class="col-sm-10">
                      <input type="number" name="InsNum"class="form-control" id="InsNumber" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="way" class="col-sm-5 col-form-label">Payment Method</label>
                    <div class="col-sm-10">
                      <input type="text"  name="PMethod"class="form-control" id="way" >
                    </div>
                  </div>

                    </div><!--left-->
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label for="Amount" class="col-sm-5 col-form-label">Amount</label>
                    <div class="col-sm-10">
                      <input type="number"  name="Amount"class="form-control" id="Amount" placeholder="Telephone">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="IDate" class="col-sm-5 col-form-label">Date of Installment</label>
                    <div class="col-sm-10">
                      <input type="date" name="IDate"class="form-control" id="IDate" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="PDate" class="col-sm-5 col-form-label">Date of Payment</label>
                    <div class="col-sm-10">
                      <input type="date"  name="PDate"class="form-control" id="PDate" >
                    </div>
                  </div>
                  </div><!--/right-->
                    </div><!--row-->
                  </div>
                  <div class="card-footer">
                    <a href="{{route('Home')}}"class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info float-right">Installment</button>
                   </div>
                    </div>
                </div>

                <!-- /.card-body -->

                <!-- /.card-footer -->


            <!-- /.card -->





        </div>         <!-- /.row -->




    </form>
  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

