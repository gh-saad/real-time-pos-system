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
        // Validate the request data
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users',
            'role' => 'required|string',
            'last_login' => 'nullable|date',
        ]);

        // Hash the password
        $validated['password'] = bcrypt($validated['password']);

        // Create the user
        $user = User::create($validated);

        return ApiResponseClass::sendResponse($user, 'User created successfully.', 201);
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
        $validated = $request->validate([
            'username' => 'sometimes|string|max:255|unique:users,username,' . $id,
            'password' => 'sometimes|string|min:6',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'role' => 'sometimes|string',
            'last_login' => 'nullable|date',
        ]);

        // Hash the password if it's being updated
        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        // Update the user
        $user->update($validated);

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
