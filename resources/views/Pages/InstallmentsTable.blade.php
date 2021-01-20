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
                <h3>Installments</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Installments table</li>
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
                    <h2 >Clients Installments information</h2>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    @csrf
                    <div style="width: 95%">
                    <table id="InsTable" class="table ui celled table stripe table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Owner ID</th>
                        <th>Installment number</th>
                        <th>Amount</th>
                        <th>Installment date</th>
                        <th>Payment date</th>
                        <th>Payment method</th>
                        <th>Block Information</th>


                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($install as $i)

                      <tr>
                        <td>{{$i->OwnerID}}</td>
                        <td>{{$i->InstallmentNumber}}</td>
                        <td>{{$i->Amount}}</td>
                        <td> {{$i->InsDate}}</td>
                        <td> {{$i->PayDate}}</td>
                        <td> {{$i->wayTopay}}</td>

                        <td><a href="{{route('blockDetails',['id'=>$i->OwnerID])}}" role="button"class="btn btn-danger">View</a></td>
                      </tr>
                      @endforeach





                      </tfoot>
                    </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
                <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

              <script>
               $(document).ready( function () {
                  $('#InsTable').DataTable({"scrollX": true});
                  $.ajaxSetup({
                  headers:{
                    'X-CSRF-Token' : $("input[name=_token]").val()
                  }
                });

                $('#InsTable').Tabledit({
                  url:'{{route('IEdit')}}',
                  dataType:"json",
                  columns:{
                    identifier:[0, 'OwnerID'],
                    editable:[ [2, 'Amount'],[3,'InsDate'],[4,'PayDate'],[5,'wayTopay']]
                  },
                  restoreButton:false,
                  onSuccess:function(install, textStatus, jqXHR)
                  {
                    if(install.action == 'delete')
                    {
                      $('#'+install.id).remove();
                    }
                  }
  });

               });




              </script>
@endsection
