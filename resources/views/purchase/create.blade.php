@extends('layouts.loggedinapp')

@section('content')
<main>
    <div class="container-fluid">
      <h1 class="mt-4">Add New Supplier</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="userTable.html">Users</a></li>
        <li class="breadcrumb-item active">Add New User</li>
      </ol>
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="m-0">Bio Data</h5>
        </div>
        <div class="card-body">
          <form action="" class="p-5 bg-white border" method="post">
            <h2 class="text-center">Purchase Order Entery</h2>
            <div class="alert alert-danger " role="alert">valition error</div>
            
            <div class="row form-group">
              <input type="hidden" class="form-control" id="sup_code" name="sup_code" value="">
              <!--      <div class="col-md-3 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname" >Date</label>
                make it select input box by boootsrat 4
                <input type="date"  class="form-control"  name="po_date" value="">
                <div id="result"></div>
              </div> -->
              <!--           <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Product name</label>
                  <input type="text"  class="form-control" placeholder="Name" name="manager_user_name" >
                </div>
                
              </div> -->
              <div class="col-md-3 mb-3 mb-md-0">
                <label class="font-weight-bold" >Product code</label>
                
                <input type="text"  class="form-control" name="pro_code" id="pro_code">
              </div>
              <div class="col-md-3">
                <label class="font-weight-bold" for="email">Quntity</label>
                
                <input type="text" class="form-control" name="pro_qty">
              </div>
              <div class="col-md-3">
                <label class="font-weight-bold" for="email">Buying price</label>
                
                <input type="text" class="form-control" name="pro_buying">
              </div>
              <div class="col-md-3">
                <label class="font-weight-bold" for="email">Salling price</label>
                
                <input type="text" class="form-control" name="pro_salling">
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" name="submit" value="Add Product" class="btn btn-primary  py-2 px-5 rounded-0 mt-2">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="m-0">Bio Data</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product code</th>
                  <th>Name</th>
                  <th>Qty</th>
                  <th>Buying</th>
                  <th>Salling</th>
                  <th>Sub total</th>
                  <th>option</th>
                </tr>
              </thead>
              <tbody>
                <form method="post" action="" >
                  
                  
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <button class="btn btn-primary" type="button" id="" data-toggle="modal" data-target="#exampleModal">Updata</button>
                      <button class="remove btn btn-danger" type="button" value="">Remove</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center" colspan="8">
                      <strong>Total :</strong>
                    </td>
                  </tr>
                </tbody>
                
              </table>
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-primary  py-2 px-4 rounded-0 mt-2" value="confurim">
        </form>
      </div>
    </div>
  
  </main>
@endsection