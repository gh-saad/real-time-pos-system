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
                        <form method="POST" action="#" onsubmit="return false">
                            <div class="form-group">
                                <label for="cat_name" class="control-label">Category Name :</label>
                                <input type="text" name="cat_name" id="cat_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cat_desc" class="control-label">Category Descripbtion :</label>
                                <input type="text" name="cat_desc" id="cat_desc" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" id="submButton" class="btn btn-primary" >Click Me!</button>
                            </div>
                        </form>
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
                            <table class="table table-bordered" id="categoryTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
{{-- 
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
                                    @endif --}}
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

@push('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
    $(function() {
        var table = $('#categoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('api.categories.index') !!}',
                columns: [
                    {data: 'category_name'},
                    {data: 'id'}, // {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
        });

        // Define the refresh function
        function refreshTable() {
            table.ajax.reload(null, false); // Reload the table data
        }

        $('#submButton').click(function(){
            const url = '{{route("api.categories.store")}}';

            // Define the data you want to send in the request body
            const data = {
                category_name: $('input[name=cat_name]').val(),
                description: $('input[name=cat_desc]').val()
            };

            // Make a POST request using the Fetch API
            fetch(url, {
                method: 'POST', // Specify the HTTP method
                headers: {
                    'Content-Type': 'application/json', // Indicate that the request body contains JSON
                    // 'Authorization': 'Bearer YOUR_TOKEN_HERE' // (Optional) Include authorization headers if needed
                },
                body: JSON.stringify(data) // Convert the data object to a JSON string
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json(); // Parse the response as JSON
            })
            .then(data => {
                refreshTable()
                console.log('Success:', data); // Handle the response data
            })
            .catch(error => {
                console.error('Error:', error); // Handle any errors
            });
        });

    });

</script>

@endpush