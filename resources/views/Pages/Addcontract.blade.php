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
            <h1>New Contract</h1>
      
    
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
      <form class="form-horizontal" method="POST" action="{{route('AddContract')}}"  enctype='multipart/form-data'>
        <div class="row">
          <!-- left column -->
          @csrf
          <div class="col-md-6">


            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title" style="font-size: 150%">Owner Information</h3>

              </div>
              <!-- /.card-header -->


                <div class="card-body">
                  <div class="form-group row">
                        <label for="inputName" class="col-sm-5 col-form-label required">Owner Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name"class="form-control" id="inputName" placeholder="User Name">
                        </div>
                  </div>
                  <div class="form-group row">
                    <label for="OwnerID" class="col-sm-5 col-form-label required">Owner ID</label>
                    <div class="col-sm-10">
                      <input type="number" name="ID" class="form-control" id="OwnerID" placeholder="ID">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputAddress" class="col-sm-5 col-form-label required">Address</label>
                    <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Telephone" class="col-sm-5 col-form-label required">Telephone</label>
                    <div class="col-sm-10">
                      <input type="tel" name="telephone" class="form-control" id="Telephone" placeholder="Telephone">
                    </div>
                  </div>
                  </div>
                </div>

                <!-- /.card-body -->


            </div>
            <!-- /.card -->
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title" style="font-size: 150%">Second Owner Information</h3>
                    </div>
                    <!-- /.card-header -->


                      <div class="card-body">
                        <div class="form-group row">
                              <label for="inputName" class="col-sm-5 col-form-label">Owner Name</label>
                              <div class="col-sm-10">
                                <input type="text" name="secondName" class="form-control" id="inputName" placeholder="Name">
                              </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-5 col-form-label">Owner ID</label>
                          <div class="col-sm-10">
                            <input type="number" name="secondID"class="form-control" id="inputEmail3" placeholder="ID">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAddress" class="col-sm-5 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input type="text" name="secondAddress"class="form-control" id="inputAddress" placeholder="Address">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Telephone" class="col-sm-5 col-form-label">Telephone</label>
                          <div class="col-sm-10">
                            <input type="tel" name="secondTelephone"class="form-control" id="Telephone" placeholder="Telephone">
                          </div>
                        </div>
                        </div>
                      </div>

                      <!-- /.card-body -->

              </div>
          </div>
          <!--/.col (left) -->


          <!-- /.card-footer -->

        </div>


        <!-- /.row -->
        <div class="row">
            <!-- left column -->

            <div class="col-md-12">


              <!-- Horizontal Form -->
              <div class="card card-info ">
                <div class="card-header">
                  <h3 class="card-title " style="padding-left: 40%; font-size: 150%">Land information</h3>
                </div>
                <!-- /.card-header -->


                  <div class="card-body ">
                    <div class="row">
                     <div class="col-md-8">
                    <div class="form-group row">
                          <label for="landnumber" class="col-sm-2 col-form-label">land number</label>
                          <div class="col-sm-6">
                            <select id="landnumber" name="landNum" class="custom-select colorful-select"  placeholder="Land number" >
                              <option value="..">..</option>
                             @foreach ($lnumbers as $n)
                              <option value="{{$n}}">{{$n}}</option>
                              @endforeach
                            </select>                           </div>
                    </div>
                    <div class="form-group row">
                      <label for="Blocknumber" class="col-sm-2 col-form-label">Block number</label>
                      <div class="col-sm-6">
                        <select id="Blocknumber" name="Blocknumber" class="custom-select colorful-select"  placeholder="Block number" >
                          <option value="..">..</option>
                          @foreach ($bnumbers as $n)
                          <option value="{{$n}}">{{$n}}</option>
                          @endforeach

                        </select>
                          </div>
                    </div>
                    <div class="form-group row">
                      <label for="PatternNum" class="col-sm-2 col-form-label required">Pattern number</label>
                      <div class="col-sm-6">
                      <select id="PatternNum" name="patternNum" class="custom-select colorful-select"  >

                        @foreach ($pnumbers as $n)

                        <option value="{{$n}}">{{$n}}</option>
                        @endforeach
                      </select>
                     </div>
                    </div>

                       </div><!--col-->
                      </div><!--/row-->
                    </div>

                    </div>

                  </div>

                  <!-- /.card-body -->


              </div>
              <!-- /.card -->

              <div class="col-md-12">
                  <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title" style="padding-left: 45%;font-size: 150%">Price</h3>
                      </div>
                      <!-- /.card-header -->

                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group row">
                                <label for="Total price" class="col-sm-5 col-form-label required">Total price</label>
                                <div class="col-sm-10">
                                  <input type="number" step="0.01" name="totPrice" class="form-control" id="Totalprice" placeholder="Total price">
                                </div>
                          </div>
                          <div class="form-group row">
                            <label for="Firstpaid" class="col-sm-5 col-form-label required">First paid</label>
                            <div class="col-sm-10">
                              <input type="number" step="0.01" name="frstP" class="form-control" id="Firstpaid" placeholder="First paid">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="chkInstallment" class="col-sm-3 col-form-label">Installment</label>
                            <div class="col-sm-5">
                              <input type="checkbox" name="chkInstallment" onclick="EnableDisableTextBox(this)" class="form-control" id="chkInstallment" placeholder="Installment">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="Installmentamount" class="col-sm-5 col-form-label">Installment amount</label>
                            <div class="col-sm-10">
                              <input type="number " name="IAm" disabled="disabled" step="0.01" class="form-control" id="Installmentamount" placeholder="Installment amount">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="Number of installments" class="col-sm-5 col-form-label">Number of installments</label>
                            <div class="col-sm-10">
                              <input type="number" name="INum"disabled="disabled" class="form-control" id="Numberofinstallments" placeholder="Number of installments">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="Paymentmethod" class="col-sm-5 col-form-label">Payment method</label>
                            <div class="col-sm-10">
                              <input type="text" name="meth"disabled class="form-control" id="Paymentmethod" placeholder="Payment method">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="Banknumber" class="col-sm-5 col-form-label">Bank number</label>
                            <div class="col-sm-10">
                              <input type="number" name="bank" disabled class="form-control" id="Banknumber" placeholder="Bank number">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="DateoffirstInstallment" class="col-sm-5 col-form-label">Date of first Installment</label>
                            <div class="col-sm-10">
                              <input type="date" name="frstidate" disabled class="form-control" id="DateoffirstInstallment" placeholder="Date of first Installment">
                            </div>
                          </div>

                        </div><!--/col right-->

                      <div class="col-md-6"><!--col right start-->
                        <div class="form-group row">
                          <label for="Otherpayments" class="col-sm-5 col-form-label">Other payments</label>
                          <div class="col-sm-10">
                            <input type="text" name="other"class="form-control" id="Otherpayments" placeholder="Other payments">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Otherpaymentsamount" class="col-sm-5 col-form-label">Other payments amount</label>
                          <div class="col-sm-10">
                            <input type="number" name="otherA" step="0.01"class="form-control" id="Otherpaymentsamount" placeholder="Amount">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Numberofpayments" class="col-sm-5 col-form-label">Number of payments</label>
                          <div class="col-sm-10">
                            <input type="number" name="otherN" class="form-control" id="Numberofpayments" placeholder="Number of payments">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Contractdate" class="col-sm-5 col-form-label">Contract date</label>
                          <div class="col-sm-10">
                            <input type="date" name="Cdate" class="form-control" id="Contractdate" placeholder="Contract date">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Adminstrativeexpenses" class="col-sm-5 col-form-label">Adminstrative expenses</label>
                          <div class="col-sm-10">
                            <input type="number" name="Aexp" class="form-control" id="Adminstrativeexpenses" placeholder="Adminstrative expenses">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="ADpaymentmethod" class="col-sm-8 col-form-label">Adminstrative expenses payment method</label>
                          <div class="col-sm-10">
                            <input type="text" name="Away"class="form-control" id="ADpaymentmethod" placeholder="payment method">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="comession amount" class="col-sm-8 col-form-label">Marketing comession amount</label>
                          <div class="col-sm-10">
                            <input type="number" name="Camount" step="0.01"class="form-control" id="comession amount" placeholder="Comession amount">
                          </div>
                          <label for="BrokerName" class="col-sm-3 col-form-label" style="padding-left: 60px;">For</label>
                          <div class="col-sm-7">
                            <select id="BrokerName" name="mar" class="custom-select colorful-select" placeholder="Broker Name" >
                              @foreach ($market as $mar)
                              <option value="{{$mar->Name}}">{{$mar->Name}}</option>

                              @endforeach

                            </select>
                          </div>
                          <label for="Paid/Discount"  class="col-sm-3 col-form-label" style="padding-left: 10px;">Paid/Discount</label>
                          <div class="col-sm-7">
                            <input type="number" step="0.01"name="PD" class="form-control" id="Paid/Discount" placeholder="Amount">
                          </div>
                        </div>




                      </div><!--/col right-->


                    </div><!--row-->
                    <div class="form-group row">
                      <label for="PComments" class="col-sm-2 col-form-label">Comments</label>
                      <div class="col-sm-8">
                        <input type="text" name="PComments" class="form-control" id="PComments" placeholder="Comments">
                      </div>
                    </div>
                  </div>   <!-- /.card-body -->

                </div>
                <div class="col-md-12">
                  <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title" style="padding-left: 40%; font-size: 150%">Documents and files</h3>
                      </div>
                      <!-- /.card-header -->

                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group row">
                                <label for="authenticsignature" class="col-sm-5 col-form-label">Authentic signature</label>
                                <div class="col-sm-8">
                                  <input type="file" class=" inputfile" name="authenticsignature" placeholder="authentic signature">
                                </div>
                          </div>
                          <div class="form-group row">
                            <label for="Signingup" class="col-sm-5 col-form-label">Signing up</label>
                            <div class="col-sm-8">
                              <input type="file" class=" inputfile" name="Signingup" placeholder="Signing up">
                            </div>
                      </div>
                        </div><!--/col left-->
                        <!--col right-->
                        <div>
                         <div class="form-group row">
                            <label for="Authorization" class="col-sm-5 col-form-label">Authorization</label>
                            <div class="col-sm-8">
                              <input type="file" class=" inputfile" name="Authorization" placeholder="Authorization">
                            </div>
                         </div>
                         <div class="form-group row">
                          <label for="Otherfiles" class="col-sm-5 col-form-label">Other files</label>
                          <div class="col-sm-8">
                            <input type="file" class=" inputfile" name="Otherfiles" placeholder="Other files">
                          </div>
                       </div>
                        </div><!--/col right-->
                        </div><!--/row-->


                </div><!--/card body-->
                <div class="card-footer">

                  <button type="submit" class="btn btn-default ">Cancel</button>
                  <button type="submit" class="btn btn-info float-right">Add Contract</button>
                </div>
            </div>
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
