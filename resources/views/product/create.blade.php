@extends('layouts.loggedinapp')

@section('content')
  <main>
      <div class="container-fluid">
        <h1 class="mt-4">Add New Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="userTable.html">Users</a></li>
            <li class="breadcrumb-item active">Add New User</li>
        </ol>
        {!! Form::open(['method' => 'POST','action' => 'ProductController@store']) !!}
          <div class="card mb-4">
            <div class="card-header">
                <h5 class="m-0">Product Data</h5>
            </div>
            <div class="card-body">
              @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                  @include('includes.form_error')
                @endforeach
              @endif
              <div class="form-row">
                  <div class="col-md-6 mb-3">
                      {!! Form::label('pro-name', 'Product Name:', ['class' => 'control-label']) !!}
                      {!! Form::text('pro_name', null, array_merge(['class' => 'form-control'])) !!}
                  </div>
                  <div class="col-md-6 mb-3">
                      {!! Form::label('pro-sku', 'Product Sku:', ['class' => 'control-label']) !!}
                      {!! Form::text('pro_sku', null, array_merge(['class' => 'form-control'])) !!}
                  </div>
              </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('cat', 'Category:', ['class' => 'control-label']) !!}
                        {!! Form::select('cat_id', [''=>'Choose Category'] + $categories  , null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('brand', 'Brand:', ['class' => 'control-label']) !!}
                        {!! Form::select('brand_id', [''=>'Choose Brand'] + $brands , null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        {!! Form::label('unit', 'Unit:', ['class' => 'control-label']) !!}
                        {!! Form::select('unit_id', [''=>'Choose unit'] + $units  , null, array_merge(['class' => 'form-control'])) !!}
                    </div>
                    <div class="col-md-6 mb-3">
                        {!! Form::label('min-qty', 'Minimum Quntity:', ['class' => 'control-label']) !!}
                        {!! Form::text('min_quntity', null, array_merge(['class' => 'form-control'])) !!}
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