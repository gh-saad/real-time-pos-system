@extends('layouts.loggedinapp')

@section('content')

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">User Table</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                            	<div class="d-flex justify-content-between">
							      <h5 class="m-0 font-weight-bold text-primary">Users</h5>
							      <a href="user/create" class="btn btn-primary btn-icon-split btn-sm">
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
                                                <th>UserName</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Create time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>UserName</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Create time</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if($users)
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->username}}</td>
                                                        <td>{{$user->user_info->first_name}} {{$user->user_info->last_name}}</td>
                                                        <td>{{$user->user_info->email}}</td>
                                                        <td>{{$user->role->role_name}}</td>
                                                        <td>{{$user->is_active == 1 ? "Active": "Not Active"}}</td>
                                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                                        <td>
                                                        	<a href="#" class="btn btn-xs btn-primary">
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