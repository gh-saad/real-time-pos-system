<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Models\User;
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
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|max:255',
                'password' => 'required|string|min:3',
                'email' => 'required|email|unique:users',
                // 'role' => 'required|string',
            ]);
        
            // Hash the password
            $validated['password'] = bcrypt($validated['password']);
        
            // Create the user
            $user = User::create($validated);
        
            // Return success response
            return ApiResponseClass::sendResponse($user, 'User created successfully!', 200);
        
        } catch (ValidationException $e) {
            // Return validation errors in your custom response format
            return ApiResponseClass::sendResponse([], $e->errors(), 422);
        }
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
        try {
            // Validate the request data
            $validated = $request->validate([
                'name' => 'sometimes|max:255' . $id,
                'password' => 'sometimes|string|min:3',
                'email' => 'sometimes|email|unique:users,email,' . $id,
            ]);

            // Hash the password if it's being updated
            if (isset($validated['password'])) {
                $validated['password'] = bcrypt($validated['password']);
            }

            // Update the user
            $user->update($validated);

            return ApiResponseClass::sendResponse($user, 'User updated successfully.', 200);
        } catch (ValidationException $e) {
            // Return validation errors in your custom response format
            return ApiResponseClass::sendResponse([], $e->errors(), 422);
        }
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
