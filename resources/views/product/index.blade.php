@extends('layouts.loggedinapp')

@push('css')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />    
@endpush

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Users</h5>
                    <a href="product/create" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add New</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sku</th>
                                <th>Name</th>
                                <th>Sale price</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Create Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#productTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.products.index') !!}',
                columns: [
                    {data: 'id'},
                    {data: 'product_name'},
                    {data: 'price'},
                    {data: 'stock_quantity'},
                    {data: 'id'}, // {data: 'category.cat_name'},
                    {data: 'id'}, // {data: 'brand.brand_name'},
                    {data: 'id'}, // {data: 'unit.unit_name'},
                    {data: 'created_at'},
                    {data: 'id'}, // {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
        });
    });
</script>
@endpush