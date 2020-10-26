@extends('layouts.loggedinapp')

@section('content')
  <main>
      <div class="container-fluid">
        <h1 class="mt-4">Edit User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="userTable.html">Users</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
        {!! Form::model($user, ['route' => ['user.update', $user] ]) !!}
          <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Bio Data</h5>
            </div>
            <div class="card-body">
              @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                  @include('includes.form_error')
                @endforeach
              @endif
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      {!! Form::label('first name','First Name:', ['class' => 'control-label']) !!}
                      {!! Form::text('first_name', $user->user_info->first_name, array_merge(['class' => 'form-control'])) !!}
                  </div>
                  <div class="col-md-6 mb-3">
                      {!! Form::label('Last Name', null, ['class' => 'control-label']) !!}
                      {!! Form::text('last_name', $user->user_info->last_name, array_merge(['class' => 'form-control'])) !!}
                  </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                    {!! Form::label('Email', null, ['class' => 'control-label']) !!}
                    {!! Form::email('email', $user->user_info->email, array_merge(['class' => 'form-control'])) !!}
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::label('Contact No', null, ['class' => 'control-label']) !!}
                    {!! Form::text('contact_no', $user->user_info->contact_no, array_merge(['class' => 'form-control'])) !!}
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                    {!! Form::label('Address', null, ['class' => 'control-label']) !!}
                    {!! Form::text('curr_address', $user->user_info->curr_address, array_merge(['class' => 'form-control'])) !!}
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
                        {!! Form::text('username',  $user->username, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Role', null, ['class' => 'control-label']) !!}
                        {!! Form::select('role_id', $roles , null, array_merge(['class' => 'form-control'])) !!}
                        
                    </div>
                  </div>
              </div>
            </div>
            <div class="form-group">
              {!! Form::submit('Click Me!') !!}
            </div>
        {!! Form::close() !!}
      </div>
  </main>
@endsection