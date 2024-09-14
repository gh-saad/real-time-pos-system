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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Create time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection

@push('script')
{{-- @foreach($users as $user)
        <tr>
            <td>{{$user->email}}</td>
            <td>{{$user->user_info->first_name}} {{$user->user_info->last_name}}</td>
            <td>{{$user->role->role_name}}</td>
            <td>{{$user->is_active == 1 ? "Active": "Not Active"}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>
            <a href="" class="btn btn-xs btn-primary">
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
    @endforeach --}}

<script>
    
    // The URL of your API
    const apiUrl = '{{route('api.users.index')}}';  // Replace with your API endpoint

    // Function to fetch user data
    async function fetchUsers() {
        try {
            const response = await fetch(apiUrl);
            // const response = await fetch(apiUrl, {
            //     method: 'GET',
            //     headers: {
            //         'Authorization': 'Bearer your_token_here',  // Example for token authentication
            //         'Content-Type': 'application/json'
            //     }
            // });  // Fetch data from the API
            const data = await response.json();    // Parse the JSON response
            
            // Call the function to populate the table with data
            populateTable(data.data);
        } catch (error) {
            console.error('Error fetching users:', error);
        }
    }

    // Function to populate the table with user data
    function populateTable(users) {
        const tableBody = document.querySelector('tbody');  // Select the table body

        // Clear the table body (if there is existing data)
        tableBody.innerHTML = '';

        // Loop through the user data and create table rows
        users.forEach(user => {
            const row = document.createElement('tr');  // Create a new row

            // Create and populate the columns (ID, Name, Email)
            const idCell = document.createElement('td');
            idCell.textContent = user.id;  // Insert user ID
            row.appendChild(idCell);  // Append cell to the row

            const nameCell = document.createElement('td');
            nameCell.textContent = user.name;  // Insert user name
            row.appendChild(nameCell);  // Append cell to the row

            const emailCell = document.createElement('td');
            emailCell.textContent = user.email;  
            row.appendChild(emailCell);

            const roleCell = document.createElement('td');
            roleCell.textContent = 'admin';  
            row.appendChild(roleCell);

            const cratedatCell = document.createElement('td');
            cratedatCell.textContent = user.created_at;  
            row.appendChild(cratedatCell);

            const statusCell = document.createElement('td');
            statusCell.textContent = user.created_at;  
            row.appendChild(statusCell);

            const adminCell = document.createElement('td');
            adminCell.innerHTML = '<a href="#" class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>';
            adminCell.innerHTML += '<a href="#" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> View</a>';
            adminCell.innerHTML += '<button data-href="#" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Delete</button>';  
            row.appendChild(adminCell);

            // Append the row to the table body
            tableBody.appendChild(row);
        });
    }

    // Call the fetchUsers function when the page loads
    window.onload = fetchUsers;
</script>
@endpush