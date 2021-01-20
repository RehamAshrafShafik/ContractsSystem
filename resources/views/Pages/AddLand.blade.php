@extends('Layout.adminLayout')
@section('title')
    Admin|AddContract
@endsection
@section('Content')
   
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Block</h1>
        
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Contract</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
           <!-- form start -->
      <form class="form-horizontal" method="POST" action="{{route('AddBlock')}}">
       
          @csrf
          
        <!-- /.row -->
        <div class="row">
            <!-- left column -->
            
            <div class="col-md-12">
            
        
              <!-- Horizontal Form -->
              <div class="card card-info ">
                <div class="card-header">
                  <h1 style="padding-left: 40%; font-size:170%">Block information</h1>
                </div>
                <!-- /.card-header -->
               
               
                  <div class="card-body ">
                    <div class="row">
                     <div class="col-md-6">
                    <div class="form-group row">
                          <label for="landnumber" class="col-sm-5 col-form-label required">land number</label>
                          <div class="col-sm-10">
                            <input type="number" name="landNum" class="form-control" id="landnumber" placeholder="land number">
                          </div>
                    </div>
                    <div class="form-group row">
                      <label for="Blocknumber" class="col-sm-5 col-form-label required">Block number</label>
                      <div class="col-sm-10">
                        <input type="number" name="blockNum" class="form-control" id="Blocknumber" placeholder="Block number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputAddress" class="col-sm-5 col-form-label required">Pattern number</label>
                      <div class="col-sm-10">
                        <input type="number"  name="patternNum" class="form-control" id="inputAddress" placeholder="Pattern number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Area" class="col-sm-5 col-form-label">Area</label>
                      <div class="col-sm-10">
                        <input type="number" name="area" class="form-control" id="Telephone" placeholder="Area">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="Telephone" class="col-sm-5 col-form-label">Number of streats</label>
                        <div class="col-sm-10">
                          <input type="number" name="strNum" class="form-control" id="Telephone" placeholder="number of streats">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="WeidthOfstreats" class="col-sm-5 col-form-label">Weidth of streats</label>
                        <div class="col-sm-10">
                          <input type="text" name="strW" class="form-control" id="WeidthOfstreats" placeholder="Weidth Of streats">
                        </div>
                      </div>
                    </div><!--/col-->
                  
                    <div class="col-md-6">

                          <div class="form-group row">
                            <label for="NumberofFaces" class="col-sm-5 col-form-label">Number of Faces</label>
                            <div class="col-sm-10">
                              <input type="number" name="facesNum" class="form-control" id="NumberofFaces" placeholder="Number of Faces">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="MartimeBoundary" class="col-sm-5 col-form-label">Martime Boundary</label>
                            <div class="col-sm-10">
                              <input type="text" name="marBound" class="form-control" id="MartimeBoundary" placeholder="Martime Boundary">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="TribalBoundary" class="col-sm-5 col-form-label">Tribal Boundary</label>
                            <div class="col-sm-10">
                              <input type="text" name="tribBound" class="form-control" id="TribalBoundary" placeholder="Tribal Boundary">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="EasternBoundary" class="col-sm-5 col-form-label">Eastern Boundary</label>
                            <div class="col-sm-10">
                              <input type="text" name="eastBound" class="form-control" id="EasternBoundary" placeholder="Eastern Boundary">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="WesternBoundary" class="col-sm-5 col-form-label">Western Boundary</label>
                            <div class="col-sm-10">
                              <input type="text" name="westBound" class="form-control" id="WesternBoundary" placeholder="Western Boundary">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="Comments" class="col-sm-5 col-form-label">Comments</label>
                            <div class="col-sm-10">
                              <input type="text" name="comments" class="form-control required" id="Comments" placeholder="Comment">
                            </div>
                          </div>
                       </div><!--col-->
                      </div><!--/row-->
                      <div class="card-footer">
                      
                        <button type="submit" class="btn btn-info float-right">Add Block</button>
                      </div>
                    </div>
                    
                    </div>

                  </div>
  
              
           
              </div>
              </div>
              <!-- /.card -->
            
                
                  
                
   
                
             
                       
               
            <!--/.card info) -->
          <!--/first col 12 div-->
         
          </div>
    </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
<script type="text/javascript">
  function EnableDisableTextBox(chkInstallment) {
      var InsA = document.getElementById("Installmentamount");
      var InsNum=document.getElementById("Numberofinstallments");
      var Paym=document.getElementById("Paymentmethod");
      var BankNum=document.getElementById("Banknumber");
      var datee=document.getElementById("DateoffirstInstallment");

      InsA.disabled = chkInstallment.checked ? false : true;
      InsNum.disabled = chkInstallment.checked ? false : true;
      Paym.disabled = chkInstallment.checked ? false : true;
      BankNum.disabled = chkInstallment.checked ? false : true;
      datee.disabled = chkInstallment.checked ? false : true;

      if (!InsA.disabled && !datee.disabled && !InsNum.disabled && !Paym.disabled  && !BankNum.disabled) {
          InsA.focus();
        
      }
  }
</script>
<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>