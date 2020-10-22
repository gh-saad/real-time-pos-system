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
        {!! Form::open(['method' => 'POST','action' => 'UsersController@store']) !!}
          <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Bio Data</h5>
            </div>
            <div class="card-body">
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      {!! Form::label('First Name', null, ['class' => 'control-label']) !!}
                      {!! Form::text('first_name', null, array_merge(['class' => 'form-control'])) !!}
                  </div>
                  <div class="col-md-6 mb-3">
                      {!! Form::label('Last Name', null, ['class' => 'control-label']) !!}
                      {!! Form::text('last_name', null, array_merge(['class' => 'form-control'])) !!}
                  </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                    {!! Form::label('Email', null, ['class' => 'control-label']) !!}
                    {!! Form::email('email', null, array_merge(['class' => 'form-control'])) !!}
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::label('Contact No', null, ['class' => 'control-label']) !!}
                    {!! Form::text('contact_no', null, array_merge(['class' => 'form-control'])) !!}
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                    {!! Form::label('Address', null, ['class' => 'control-label']) !!}
                    {!! Form::text('curr_address', null, array_merge(['class' => 'form-control'])) !!}
                </div>
              </div>
            </div>
            </div>
            <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Account Details:</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Username', null, ['class' => 'control-label']) !!}
                        {!! Form::text('username', null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Role', null, ['class' => 'control-label']) !!}
                        {!! Form::select('role_id', [''=>'Choose Role'] + $roles , null, array_merge(['class' => 'form-control'])) !!}
                        
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Password', null, ['class' => 'control-label']) !!}
                        {!! Form::password('password', array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('confirm password', null, ['class' => 'control-label']) !!}
                        {!! Form::password('cpassword', array_merge(['class' => 'form-control'])) !!}
                    </div>
                  </div>
              </div>
            </div>
            <div class="form-group">
              {!! Form::submit('Click Me!') !!}
            </div>
        {!! Form::close() !!}
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                @include('includes.form_error')
            @endforeach
        @endif
      </div>
  </main>
@endsection