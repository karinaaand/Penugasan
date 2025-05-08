<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints for managing users"
 * )
 */
class UserController extends ApiController
{
    /**
     * @OA\Get(
     *     path="/api/v1/users",
     *     summary="Get list of users",
     *     tags={"Users"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search by name or email",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="role",
     *         in="query",
     *         description="Filter by role",
     *         @OA\Schema(type="string", enum={"super", "admin", "doctor", "clinic"})
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Number of items per page",
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Users retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="array", @OA\Items(type="object")),
     *             @OA\Property(property="current_page", type="integer", example=1),
     *             @OA\Property(property="last_page", type="integer", example=5),
     *             @OA\Property(property="per_page", type="integer", example=15),
     *             @OA\Property(property="total", type="integer", example=75)
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Only super admin can access"
     *     )
     * )
     */
    public function index(Request $request)
    {
        // Check if user is super admin
        if ($request->user()->role !== 'super') {
            return $this->errorResponse('Unauthorized', [], 403);
        }

        $query = User::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by role
        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->paginate($request->per_page ?? 15);

        return $this->successResponse($users, 'Users retrieved successfully');
    }

    /**
     * @OA\Post(
     *     path="/api/v1/users",
     *     summary="Create a new user",
     *     tags={"Users"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "role"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="password123"),
     *             @OA\Property(property="role", type="string", enum={"super", "admin", "doctor", "clinic"}, example="admin"),
     *             @OA\Property(property="avatar", type="string", format="binary")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="john@example.com"),
     *                 @OA\Property(property="role", type="string", example="admin"),
     *                 @OA\Property(property="avatar", type="string", example="avatar/123456.jpg")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Only super admin can create users"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        // Check if user is super admin
        if ($request->user()->role !== 'super') {
            return $this->errorResponse('Unauthorized', [], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:super,admin,doctor,clinic',
            'avatar' => 'nullable|image|max:2048'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors(), 422);
        }

        try {
            $avatar = 'avatar/Avatar.jpg';

            if ($request->hasFile('avatar')) {
                $avatar = Storage::disk('public')->put('avatar', $request->file('avatar'));
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'avatar' => $avatar
            ]);

            return $this->successResponse($user, 'User created successfully', 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create user: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/v1/users/{id}",
     *     summary="Get user details",
     *     tags={"Users"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User retrieved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="john@example.com"),
     *                 @OA\Property(property="role", type="string", example="admin"),
     *                 @OA\Property(property="avatar", type="string", example="avatar/123456.jpg")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Only super admin can access"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function show(Request $request, User $user)
    {
        // Check if user is super admin
        if ($request->user()->role !== 'super') {
            return $this->errorResponse('Unauthorized', [], 403);
        }

        return $this->successResponse($user, 'User retrieved successfully');
    }

    /**
     * @OA\Put(
     *     path="/api/v1/users/{id}",
     *     summary="Update user details",
     *     tags={"Users"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "role"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="role", type="string", enum={"super", "admin", "doctor", "clinic"}, example="admin"),
     *             @OA\Property(property="avatar", type="string", format="binary")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="john@example.com"),
     *                 @OA\Property(property="role", type="string", example="admin"),
     *                 @OA\Property(property="avatar", type="string", example="avatar/123456.jpg")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Only super admin can update users"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function update(Request $request, User $user)
    {
        // Check if user is super admin
        if ($request->user()->role !== 'super') {
            return $this->errorResponse('Unauthorized', [], 403);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:super,admin,doctor,clinic',
            'avatar' => 'nullable|image|max:2048'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors(), 422);
        }

        try {
            if ($request->hasFile('avatar')) {
                Storage::disk('public')->delete($user->avatar);
                $avatar = Storage::disk('public')->put('avatar', $request->file('avatar'));
                $user->avatar = $avatar;
            }

            $user->update($request->except(['avatar']));

            return $this->successResponse($user, 'User updated successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update user: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/users/{id}",
     *     summary="Delete a user",
     *     tags={"Users"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Only super admin can delete users"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Cannot delete your own account"
     *     )
     * )
     */
    public function destroy(Request $request, User $user)
    {
        // Check if user is super admin
        if ($request->user()->role !== 'super') {
            return $this->errorResponse('Unauthorized', [], 403);
        }

        try {
            if ($user->id === auth()->id()) {
                return $this->errorResponse('Cannot delete your own account', [], 422);
            }

            Storage::disk('public')->delete($user->avatar);
            $user->delete();

            return $this->successResponse(null, 'User deleted successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to delete user: ' . $e->getMessage(), [], 500);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/v1/profile",
     *     summary="Update user profile",
     *     tags={"Users"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
     *             @OA\Property(property="avatar", type="string", format="binary")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Profile updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="john@example.com"),
     *                 @OA\Property(property="role", type="string", example="admin"),
     *                 @OA\Property(property="avatar", type="string", example="avatar/123456.jpg")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|max:2048'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation error', $validator->errors(), 422);
        }

        try {
            if ($request->hasFile('avatar')) {
                Storage::disk('public')->delete($user->avatar);
                $avatar = Storage::disk('public')->put('avatar', $request->file('avatar'));
                $user->avatar = $avatar;
            }

            $user->update($request->except(['avatar']));

            return $this->successResponse($user, 'Profile updated successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to update profile: ' . $e->getMessage(), [], 500);
        }
    }
} 