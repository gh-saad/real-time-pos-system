@extends('layouts.loggedinapp')

@section('content')
  <main>
      <div class="container-fluid">
        <h1 class="mt-4">Add New Customer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="userTable.html">Users</a></li>
            <li class="breadcrumb-item active">Add New User</li>
        </ol>
        {!! Form::open(['method' => 'POST', 'route' => 'customer.store']) !!}
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
                      {!! Form::label('First Name', null, ['class' => 'control-label']) !!}
                      {!! Form::text('first_name', null, array_merge(['class' => 'form-control'])) !!}
                  </div>
                  <div class="col-md-6 mb-3">
                      {!! Form::label('Last Name', null, ['class' => 'control-label']) !!}
                      {!! Form::text('last_name', null, array_merge(['class' => 'form-control'])) !!}
                  </div>
              </div>
            </div>
            </div>
            <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Business Details:</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Business Name', 'Business Name :', ['class' => 'control-label']) !!}
                        {!! Form::text('business_name', null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Email', null, ['class' => 'control-label']) !!}
                        {!! Form::email('email', null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Contact No', 'Contact No :', ['class' => 'control-label']) !!}
                        {!! Form::text('contact', null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Alternate Contact No', 'Alternate Contact No :', ['class' => 'control-label']) !!}
                        {!! Form::text('alt_contact', null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Area', 'Area :', ['class' => 'control-label']) !!}
                        {!! Form::text('area', null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('Address', 'Address :', ['class' => 'control-label']) !!}
                        {!! Form::text('address', null, array_merge(['class' => 'form-control'])) !!}
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