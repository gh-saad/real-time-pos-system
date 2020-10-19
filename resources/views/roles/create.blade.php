@extends('layouts.loggedinapp')

@section('content')
  <main>
      <div class="container-fluid">
          <h1 class="mt-4">Add New Role</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="userTable.html">Roles</a></li>
              <li class="breadcrumb-item active">Add New Role</li>
          </ol>
          <form class="needs-validation" novalidate>
              <div class="card mb-4">
                  
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Role Name:*</label>
                        <input type="text" class="form-control" id="validationTooltip01" placeholder="Enter Role Name" required>
                        <div class="valid-tooltip">
                          Looks good!
                        </div>
                      </div>
                    </div>
                    <hr/>
                    <h6>Permissions</h6>
                    <div class="form-row">
                      <div class="col-md-2 mb-3 text-center">
                        <label for="validationTooltip01">User</label>
                      </div>
                      <div class="col-md-5">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userSelectallCheck">
                          <label class="custom-control-label" for="userSelectallCheck">Select All</label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userViewCheck">
                          <label class="custom-control-label" for="userViewCheck">View</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userAddCheck">
                          <label class="custom-control-label" for="userAddCheck">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userEditCheck">
                          <label class="custom-control-label" for="userEditCheck">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userDeleteCheck">
                          <label class="custom-control-label" for="userDeleteCheck">Delete</label>
                        </div>
                      </div>
                    </div>
                    <hr/>
                    <div class="form-row">
                      <div class="col-md-2 mb-3 text-center">
                        <label for="validationTooltip01">User</label>
                      </div>
                      <div class="col-md-5">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userSelectallCheck">
                          <label class="custom-control-label" for="userSelectallCheck">Select All</label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userViewCheck">
                          <label class="custom-control-label" for="userViewCheck">View</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userAddCheck">
                          <label class="custom-control-label" for="userAddCheck">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userEditCheck">
                          <label class="custom-control-label" for="userEditCheck">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userDeleteCheck">
                          <label class="custom-control-label" for="userDeleteCheck">Delete</label>
                        </div>
                      </div>
                    </div>
                    <hr/>
                    <div class="form-row">
                      <div class="col-md-2 mb-3 text-center">
                        <label for="validationTooltip01">User</label>
                      </div>
                      <div class="col-md-5">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userSelectallCheck">
                          <label class="custom-control-label" for="userSelectallCheck">Select All</label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userViewCheck">
                          <label class="custom-control-label" for="userViewCheck">View</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userAddCheck">
                          <label class="custom-control-label" for="userAddCheck">Add</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userEditCheck">
                          <label class="custom-control-label" for="userEditCheck">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="userDeleteCheck">
                          <label class="custom-control-label" for="userDeleteCheck">Delete</label>
                        </div>
                      </div>
                    </div>
                    <hr/>
                  </div>
              </div>
          <button class="btn btn-primary" type="submit">Submit form</button>    
          </form>
      </div>
  </main>
  @endsection