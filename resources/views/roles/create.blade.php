@extends('layouts.loggedinapp')

@section('content')
  <main>
      <div class="container-fluid">
          <h1 class="mt-4">Add New Role</h1>
          {{-- <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="userTable.html">Roles</a></li>
              <li class="breadcrumb-item active">Add New Role</li>
          </ol> --}}
          {!! Form::open(['method' => 'POST','action' => 'RolesController@store']) !!}
            <div class="card mb-4">
                    
              <div class="card-body">
                @if(count($errors) > 0)
                  @foreach($errors->all() as $error)
                    @include('includes.form_error')
                  @endforeach
                @endif
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    {!! Form::label('Role Name', 'Role Name:*', ['class' => 'control-label']) !!}
                    {!! Form::text('role_name',null, ['class' => 'form-control', 'placeholder'=> 'Enter Role Name','']) !!}
                  </div>
                </div>
                <hr/>
                <h6>Permissions</h6>
                {{-- <div class="form-row">
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
                </div> --}}
                <hr/>

              </div>
            </div>
            <div class="form-group">
              {!! Form::submit('Click Me!') !!}
            </div>
          {!! Form::close() !!}

      </div>
  </main>
  @endsection

  