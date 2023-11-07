<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * @OA\Post(
 *     path="/api/event",
 *     summary="Register a new user",
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         description="User's name",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="email",
 *         in="query",
 *         description="User's email",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="password",
 *         in="query",
 *         description="User's password",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(response="201", description="User registered successfully"),
 *     @OA\Response(response="422", description="Validation errors")
 * )
 */
/**
 * @OA\Get(
 *     path="/api/user",
 *     summary="Get logged-in user details",
 *     @OA\Response(response="200", description="Success"),
 *     security={{"bearerAuth":{}}}
 * )
 */
class EventController extends Controller
{
    public function index(Request $request) {
        return response()->json([
            'name' => $request->input('name'),
            'message' => 'Helloworld'
        ]);
    }
}
