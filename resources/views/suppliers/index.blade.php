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

@push('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.suppliers.index') !!}',
                columns: [
                    {data: 'supplier_name'},
                    {data: 'contact_name'},
                    {data: 'email'},
                    {data: 'phone'}, // {data: 'category.cat_name'},
                    {data: 'address'}, // {data: 'brand.brand_name'},
                    {data: 'created_at'},
                    {data: 'id'}, // {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
        });
    });
</script>
@endpush
