@extends('layouts.loggedinapp')

@section('content')

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Suppliers</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<div class="d-flex justify-content-between">
							      <h5 class="m-0 font-weight-bold text-primary">Users</h5>
							      <a href="supplier/create" class="btn btn-primary btn-icon-split btn-sm">
							        <span class="icon text-white-50">
							          <i class="fas fa-plus"></i>
							        </span>
							        <span class="text">Add New</span>
							      </a>
							    </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Buisness Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>contact No.</th>
                                                <th>Status</th>
                                                <th>Create Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Buisness Name</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>contact No.</th>
                                                <th>Status</th>
                                                <th>Create Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if($suppliers)
                                                @foreach($suppliers as $supplier)
                                                    <tr>
                                                        <td>{{$supplier->business_name}}</td>
                                                        <td>{{$supplier->first_name}} {{$supplier->last_name}}</td>
                                                        <td>{{$supplier->email}}</td>
                                                        <td>{{$supplier->contact}}</td>
                                                        <td>{{$supplier->is_active == 1 ? "Active": "Not Active"}}</td>
                                                        <td>{{$supplier->created_at->diffForHumans()}}</td>
                                                        <td>
                                                        <a href="{{route('user.edit', $supplier->id)}}" class="btn btn-xs btn-primary">
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
                </main>
@endsection