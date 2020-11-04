@extends('layouts.loggedinapp')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Category</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="m-0">Add New Category</h5>
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                @include('includes.form_error')
                            @endforeach
                        @endif
                        {!! Form::open(['method' => 'POST','action' => 'CategoryController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Category Name :', ['class' => 'control-label']) !!}
                            {!! Form::text('cat_name', null, array_merge(['class' => 'form-control'])) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Click Me!', array_merge(['class' => 'btn btn-primary'])) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary">Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <tr>
                                               <td>{{$category->cat_name}}</td>
                                                <td>
                                                <a href="{{ route('user.edit', $category->id) }}" class="btn btn-xs btn-primary">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-xs btn-info">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                       <button data-href="#" class="btn btn-xs btn-danger">
                                                           <i class="fas fa-trash"></i> Delete
                                                       </button>
                                                   </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection