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
                <h1>Contracts data</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
                  <li class="breadcrumb-item active">Contracts table</li>
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
                  <div class="card-body" >
                   <table id="data"  class="table table-info table-bordered table-hover"style="width:100%">
                     @csrf
                     <thead class="thead-dark">
                      <tr>
                        <th >Owner ID</th>
                        <th >Land number</th>
                        <th >Block number</th>
                        <th >Pattern number</th>

                        <th >Total price</th>
                        <th >First Paid</th>
                        <th >Installment</th>
                        <th >Number of Installments</th>
                        <th >Date of Contract</th>
                        <th >Administrative Expenses</th>
                        <th >Marketing Commissions</th>
                        <th >Agent</th>
                        <th >Comments</th>


                      </tr>
                     </thead>
                     <tbody>
                      @foreach ($land as $l)
                        @if ($l->OwnerID!="")
                        <tr>
                         <td>{{$l->OwnerID}} </td>
                         <td>{{$l->landNum}}</td>
                         <td>{{$l->BlockNum}}</td>
                         <td>{{$l->PatternNum}}</td>

                         @foreach ($pay as $p)
                           @if ($p->OwnerID==$l->OwnerID)
                             <td>{{$p->TotalPrice}}</td>
                             <td>{{$p->FirstPaid}}</td>
                             @if ($p->installment==1)
                               <td><i class="glyphicon glyphicon-thumbs-up" style="color:rgb(23, 162, 184); font-size:120%;"></i></td>
                             @else
                               <td> <i class="glyphicon glyphicon-remove" style="color:rgb(23, 162, 184)"></i></td>
                             @endif

                            <td>{{$p->numOfinstallments}} </td>
                            <td>{{$p->dateOfContract}}</td>
                            <td>{{$p->AdministrativeExpenses}}</td>
                            <td>{{$p->MarketingCommission}}</td>
                            <td>{{$p->Marketer}}</td>
                            <td>{{$p->Comments}}</td>
                          
                        @endif
                        
                      @endforeach
                      </tr>
                    @endif
                   @endforeach
                  </tbody>
                </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

    <script>
      $(document).ready( function () {
        $('#data').DataTable({ "scrollX": true,
      });

        $.ajaxSetup({
        headers:{
          'X-CSRF-Token' : $("input[name=_token]").val()
        }
      });

      $('#data').Tabledit({
        url:'{{ route("ConEdit") }}',
        dataType:"json",
        columns:{
          identifier:[0, 'OwnerID'],
            editable:[[1, 'landNum', '{@foreach($land as $key=>$l)"{{$l->landNum}}": "{{$l->landNum}}"@if ($key+1!=count($land)),@endif @endforeach}'],
                [2, 'BlockNum', '{@foreach($land as $key=>$l) "{{$l->BlockNum}}": "{{$l->BlockNum}}" @if ($key+1!=count($land)),@endif @endforeach}']
                ,[3, 'PatternNum', '{@foreach($land as $key=>$l) "{{$l->PatternNum}}": "{{$l->PatternNum}}" @if ($key+1!=count($land)),@endif @endforeach}'],
                [4, 'TotalPrice'], [5, 'FirstPaid'],[8,'AdministrativeExpenses'],[10,'MarketingCommission'],
                [11,'Marketer', '{@foreach($mar as $key=>$m) "{{$m->Name}}": "{{$m->Name}}" @if ($key+1!=count($mar)),@endif @endforeach}'],
                [12,'Comments']]
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

   </script>

@endsection

