<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return ApiResponseClass::sendResponse($users, 'Users retrieved successfully.', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'password' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            // 'role' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }
    
        // Hash the password
        $encryptedPassword = bcrypt($request->password);
        
        $data = [
            'name' => $request->name,
            'password' => $encryptedPassword,
            'email' => $request->email,
            "created_by" => getActiveUserId(),
            "workspace_id" => getActiveWorkspaceId(),
        ];
        // Create the user
        $user = User::create($data);
    
        // Return success response
        return ApiResponseClass::sendResponse($user, 'User created successfully!', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find user by ID or fail
        $user = User::findOrFail($id);
        return ApiResponseClass::sendResponse($user, 'User retrieved successfully.', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find user by ID or fail
        $user = User::findOrFail($id);
        
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'password' => 'sometimes|string|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        if ($validator->fails()) {
            return ApiResponseClass::sendResponse([], $validator->errors(), 422);
        }
        
        $user->name = $request->name;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->save();

        return ApiResponseClass::sendResponse($user, 'User updated successfully.', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find user by ID or fail
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return ApiResponseClass::sendResponse(null, 'User deleted successfully.', 204);
    }
}
