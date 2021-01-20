@extends('Layout.adminLayout')
@section('title')
    Admin|Home|Contracts table
@endsection
@section('Content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Project data</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Blocks table</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Blocks information</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="BlockData" class="table table-bordered table-hover" style="width:100%">
                      @csrf

                      <thead>
                      <tr>
                        <th>index</th>

                        <th>Land Number</th>
                        <th>Block Number</th>
                        <th>Pattern number</th>
                        <th>Land area</th>
                        <th>Streats  </th>
                        <th>Weidth of streats</th>
                        <th>Faces</th>
                        <th>Martime Boundary</th>
                        <th>Tribal Boundary</th>
                        <th>Eastern Boundary</th>
                        <th>Western Boundary</th>
                        <th>Comments</th>
                        <th>Sold</th>


                      </tr>
                      </thead>
                      <tbody>

                      @foreach ($land as $l)
                      <tr>
                        <td>{{$l->indexx}} </td>

                     <td>{{$l->landNum}} </td>
                     <td>{{$l->BlockNum}} </td>

                      <td>{{$l->PatternNum}}</td>

                      <td>{{$l->landArea}}</td>
                      <td>{{$l->numOfstreats}}</td>
                      <td>{{$l->weidthOfstreats}} </td>
                      <td>{{$l->numOffaces}}</td>
                      <td>{{$l->MaritimeBoundary}}</td>
                      <td>{{$l->TribalBoundary}}</td>
                      <td>{{$l->EasternBoundary}}</td>
                      <td>{{$l->WesternBoundary}}</td>

                      <td>{{$l->Comments}}</td>
                      @if ($l->OwnerID!='')
                      <td><i class="glyphicon glyphicon-thumbs-up" style="color:rgb(23, 162, 184); font-size:120%;"></i></td>

                      @else
                      <td> <i class="glyphicon glyphicon-remove" style="color:rgb(23, 162, 184)"></i></td>

                      @endif

                      @endforeach


                    </tr>

                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
                <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

              <script>
               $(document).ready( function () {
                  $('#BlockData').DataTable({"scrollX": true});
                  $.ajaxSetup({
                  headers:{
                    'X-CSRF-Token' : $("input[name=_token]").val()
                  }
                });

                $('#BlockData').Tabledit({
                  url:'{{ route("BEdit") }}',
                  dataType:"json",
                  columns:{
                    identifier:[0, 'indexx'],
                    editable:[[1, 'landNum'],[2,'BlockNum'],[3,'PatternNum'],[4,'landArea'],[5,'numOfstreats'],[6,'weidthOfstreats'],
                  [7,'numOffaces'],[8,'MaritimeBoundary'],[9,'TribalBoundary'],[10,'EasternBoundary'],[11,'WesternBoundary'],[12,'Comments']]
                  },
                  restoreButton:false,
                  onSuccess:function(land, textStatus, jqXHR)
                  {
                    if(land.action == 'delete')
                    {
                      $('#'+land.id).remove();
                    }
                  }
  });

               });




              </script>
              @endsection
