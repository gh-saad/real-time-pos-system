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
                                                <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-xs btn-primary">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                <a href="#" class="btn btn-xs btn-info">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                
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

  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center text-danger">
                <i class="fas fa-exclamation-circle" style="font-size: 100px"></i>
                <h3>Are you Sure ?</h3>
                <h6 class="text-muted">This suppplier will be Deleted</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="btn-delete">Yes</button>
            </div>
        </div>
        </div>
    </div>

@endsection

