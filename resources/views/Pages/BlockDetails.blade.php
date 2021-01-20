@extends('Layout.adminLayout')
@section('title')
    Admin|Commisions details
@endsection
@section('Content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('ITable')}}">Installments Table</a></li>
                <li class="breadcrumb-item active">Agent Commisions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
           <!-- form start -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">


            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header" style="width:200%">
                <h3 >Block details </h3>
              </div>
              <!-- /.card-header -->


                <div class="card-body">
                    <table id="det" class="table table-bordered compact table-hover" style="width:100%">
                        @csrf
                        <thead>
                        <tr>
                          <th>Owner ID</th>
                          <th>land Number</th>
                          <th>Block Number</th>
                          <th>Pattern Number</th>
                          <th>land Area</th>
                          <th>number Of streats</th>
                          <th>weidth Of streats</th>
                          <th>num Of faces</th>
                          <th>MaritimeBoundary</th>
                          <th>TribalBoundary</th>
                          <th>EasternBoundary</th>
                          <th>WesternBoundary</th>
                          <th>Comments</th>



                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($block as $m)

                        <tr>
                          <td>{{$m->OwnerID}}</td>
                          <td>{{$m->landNum}}</td>
                          <td>{{$m->BlockNum}}</td>
                          <td>{{$m->PatternNum}}</td>
                          <td>{{$m->landArea}}</td>
                          <td>{{$m->numOfstreats}}</td>
                          <td>{{$m->weidthOfstreats}}</td>
                          <td>{{$m->numOffaces}}</td>
                          <td>{{$m->MaritimeBoundary}}</td>
                          <td>{{$m->TribalBoundary}}</td>
                          <td>{{$m->EasternBoundary}}</td>
                          <td>{{$m->WesternBoundary}}</td>
                          <td>{{$m->Comments}}</td>


                        </tr>
                        @endforeach





                        </tfoot>
                      </table>


                <!-- /.card-body -->

                <!-- /.card-footer -->

            </div>

            <!-- /.card -->





        </div>         <!-- /.row -->

  </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

<script>
 $(document).ready( function () {
    $('#det').DataTable({"scrollX": true});

  });
</script>
@endsection
