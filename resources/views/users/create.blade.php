@extends('layouts.loggedinapp')

@section('content')
  <main>
      <div class="container-fluid">
        <h1 class="mt-4">Add New User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="userTable.html">Users</a></li>
            <li class="breadcrumb-item active">Add New User</li>
        </ol>
        <form method="POST" action="UserController@store"> <!-- Assuming your backend URL -->
          <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Bio Data</h5>
            </div>
            <div class="card-body">
              <!-- Error Handling Example -->
              <div class="errors">
                <!-- Display errors dynamically -->
              </div>

              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      <label for="first_name" class="control-label">First Name</label>
                      <input type="text" name="first_name" id="first_name" class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="last_name" class="control-label">Last Name</label>
                      <input type="text" name="last_name" id="last_name" class="form-control">
                  </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="contact_no" class="control-label">Contact No</label>
                    <input type="text" name="contact_no" id="contact_no" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="curr_address" class="control-label">Address</label>
                  <input type="text" name="curr_address" id="curr_address" class="form-control">
              </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Account Details</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="email" class="control-label">Email</label>
                      <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role_id" class="control-label">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Choose Role</option>
                            <!-- Dynamically populate roles here -->
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpassword" class="control-label">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control">
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary">Click Me!</button>
          </div>
        </form>
        </form>
      </div>
  </main>
@endsection