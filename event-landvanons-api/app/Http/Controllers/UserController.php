<?php
//
//namespace App\Http\Controllers;
//
//use App\Http\Controllers\Controller;
//use App\Models\User;
//use Illuminate\Http\Request;
//use function Laravel\Prompts\password;
///**
// * @OA\Post(
// *     path="/api/register",
// *     summary="Register a new user",
// *     @OA\Parameter(
// *         name="name",
// *         in="query",
// *         description="User's name",
// *         required=true,
// *         @OA\Schema(type="string")
// *     ),
// *     @OA\Parameter(
// *         name="email",
// *         in="query",
// *         description="User's email",
// *         required=true,
// *         @OA\Schema(type="string")
// *     ),
// *     @OA\Parameter(
// *         name="password",
// *         in="query",
// *         description="User's password",
// *         required=true,
// *         @OA\Schema(type="string")
// *     ),
// *     @OA\Response(response="201", description="User registered successfully"),
// *     @OA\Response(response="422", description="Validation errors")
// * )
// */
///**
// * @OA\Get(
// *     path="/api/user",
// *     summary="Get logged-in user details",
// *     @OA\Response(response="200", description="Success"),
// *     security={{"bearerAuth":{}}}
// * )
// */
//class UserController extends Controller
//{
//    public function register (Request $request) {
//        $validateData = $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|unique:users|max:255',
//            'password' => 'required'
//        ]);
//
//        $user = User::create([
//            'name' => $validateData['name'],
//            'email' => $validateData['email'],
//            'password' => $validateData['password']
//        ]);
//
//        return response()->json(['message' => 'User is successfully created' ], 201);
//    }
//    public function getUserDetails(Request $request)
//    {
//        $user = $request->user();
//        return response()->json(['user' => $user], 200);
//    }
//}
