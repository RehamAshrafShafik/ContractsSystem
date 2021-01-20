@extends('Layout.adminLayout')
@section('title')
    Admin|Home
@endsection
@section('Content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('Home')}}">Home</a></li>
            
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         <div class="col-md-6" style="padding: 2%">
        <div class="card card-info " >

            <!-- /.card-header -->
              <div class="card-body">
                <div class="small-box bg-info" >
                  <div style="height: 400px">
                    <img src="https://iguana-idm.com/wp-content/uploads/Contract-Management-2.jpg" style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;object-fit: cover;">
                  </div>
                    <div class="inner"style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;" >
                      <div class="row">
                        <div class="col-md-4">
                      <h3>{{count($client)}}</h3>
      
                      <h3>Contracts</h3>
                    </div><!--/left col-->
                    <div class="col-md-8" style="padding-left:20%">

                      <a href="{{route('AddC')}}" class="btn btn-danger" role="button" style="width:100%">Add Contract</a>
                    </div><!--/right-->
                    </div><!--/row-->
                    </div>
    
                    <a href="{{route('ConTable')}}" class="small-box-footer">View all Contracts <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            </div><!--/card info-->
         </div><!--/left col-->
        
           
         <div class="col-md-6" style="padding: 2%">
          <div class="card card-info " >
  
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="small-box bg-info" >
                    <div style="height: 400px">
                      <img src="https://1v1d1e1lmiki1lgcvx32p49h8fe-wpengine.netdna-ssl.com/wp-content/uploads/2019/05/1556699859-Commission-ban-feature.jpg" style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;object-fit: cover;">
                    </div>
                      <div class="inner"style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;" >
                        <div class="row">
                          <div class="col-md-4">
                        <h3>{{count($market)}}</h3>
        
                        <h3>Commisions</h3>
                      </div><!--/left col-->
                      <div class="col-md-8" style="padding-left:27%">
  
                        <a href="{{route('AddA')}}" class="btn btn-danger" role="button"style="width:100%">Add Agent</a>
                      </div><!--/right-->
                      </div><!--/row-->
                      </div>
      
                      <a href="{{route('CommTable')}}" class="small-box-footer">View all commissions <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
              </div><!--/card info-->
           </div><!--/left col-->
    </div><!--/row-->
    </div>
    <div class="row">
      <div class="col-md-6" style="padding: 2%">
     <div class="card card-info " >

         <!-- /.card-header -->
           <div class="card-body">
             <div class="small-box bg-info" >
               <div style="height: 400px">
                 <img src="https://assets.entrepreneur.com/content/3x2/2000/20170731105151-graphicstock-common-modern-business-skyscrapers-high-rise-buildings-architecture-raising-to-the-sky-sun-concepts-of-financial-economics-future-etc-h-dvsowxsx.jpg" style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;object-fit: cover;">
               </div>
                 <div class="inner"style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;" >
                   <div class="row">
                     <div class="col-md-4">
                   <h3>{{count($land)}}</h3>
   
                   <h3>Block</h3>
                 </div><!--/left col-->
                 <div class="col-md-8" style="padding-left:20%">

                   <a href="{{route('AddL')}}" class="btn btn-danger" role="button"style="width:100%">Add Block</a>
                 </div><!--/right-->
                 </div><!--/row-->
                 </div>
 
                 <a href="{{route('BlockTable')}}" class="small-box-footer">View all Blocks <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
         </div><!--/card info-->
      </div><!--/left col-->
      <div class="col-md-6 "style="padding: 2%">
        <div class="card card-info "  >

            <!-- /.card-header -->
              <div class="card-body">
                <div class="small-box bg-info" >
                  <div style="height: 400px">
                    <img src="https://lotusmattress.com/wp-content/uploads/2020/02/Installment-eng-01.jpg" style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;object-fit: cover;">
                  </div>
                    <div class="inner"style="margin-left: auto; margin-right: auto; display: block; width:100%;height:100%;" >
                      <div class="row">
                        <div class="col-md-4">
                      <h3>{{count($install)}}</h3>
      
                      <h3>Installments</h3>
                    </div><!--/left col-->
                    <div class="col-md-8" style="padding-left:20%">

                      <a href="{{route('AddI')}}" class="btn btn-danger" role="button"style="width:100%">Add Installment</a>
                    </div><!--/right-->
                    </div><!--/row-->
                    </div>
    
                    <a href="{{route('ITable')}}" class="small-box-footer">View all installments <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            </div><!--/card info-->
         </div><!--/left col-->
    </div><!--/Row-->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap 4 -->


  <script src="{{asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection