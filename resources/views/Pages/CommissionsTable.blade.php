@extends('Layout.adminLayout')
@section('title')
    Admin|Home|Commissions table
@endsection
@section('Content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Commissions data</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Commissions table</li>
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
                    <h3 class="card-title">Client Contract information</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="CommTable" class="table table-bordered table-hover" style="width:100%">
                      @csrf
                      <thead>
                      <tr>
                        <th>Agent Name</th>
                        <th>Agent ID</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Commissions</th>


                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($market as $m)

                      <tr>
                        <td>{{$m->Name}}</td>
                        <td>{{$m->ID}}</td>
                        <td>{{$m->Phone}}</td>
                        <td> {{$m->address}}</td>
                        <td><a href="{{route('CommModal',['Name'=>$m->Name])}}" class="btn btn-danger" role="button" style="width:70%">View</a>
                        </td>
                      </tr>
                      @endforeach





                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->

                </div>
                <!-- /.card -->


                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
                <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
                  <script src="{asset('css/Editor-PHP-1.9.5/js/dataTables.editor.min.js')}"></script>
              <script>
               $(document).ready( function () {
                  $('#CommTable').DataTable({"scrollX": true});
                  $.ajaxSetup({
                  headers:{
                    'X-CSRF-Token' : $("input[name=_token]").val()
                  }
                });

                $('#CommTable').Tabledit({
                  url:'{{ route("marEdit") }}',
                  dataType:"json",
                  columns:{
                    identifier:[1, 'ID'],
                    editable:[[0, 'Name'], [2, 'Phone'], [3, 'Address']]
                  },
                  restoreButton:false,
                  onSuccess:function(market, textStatus, jqXHR)
                  {
                    if(market.action == 'delete')
                    {
                      $('#'+market.id).remove();
                    }
                  }
  });

               });
              // When the user clicks on <div>, open the popup

              </script>
  @endsection
