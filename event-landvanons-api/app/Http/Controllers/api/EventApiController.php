<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use http\Env\Response;
use Illuminate\Http\Request;
use Mockery\Exception;

class EventApiController extends Controller
{
    /**
     * @OA\Get (
     *      path="/api/events",
     *      operationId="showEvents",
     *      tags={"Events"},
     *      summary="Show Events",
     *      description="Returns list of events",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function show_events()
    {
        $events = Event::all();
        return response()->json($events, 200);
    }

    /**
     * @OA\Get (
     *      path="/api/event/{id}",
     *      operationId="getEvent",
     *      tags={"Events"},
     *      summary="Show Events",
     *        @OA\Parameter(
     *       name="id",
     *       description="Product Category ID",
     *       example=1,
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     * ),
     *      description="Return a event by given id",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function get_event($id)
    {
        try {
            $event = Event::find($id);
            if ($event != null) {
                return response()->json($event, 200);
            } else {
                return response()->json('Event is not found', 404);
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception message ' . $message);

            $code = $e->getCode();
            var_dump('Exception code' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);
            exit;
        }
    }

    /**
     * @OA\Put  (
     *      path="/api/events/{id}",
     *      operationId="createEvent",
     *      tags={"Events"},
     *      summary="Update Events",
     * @OA\Parameter(
     *        name="id",
     *        description="Product Category ID",
     *        example=1,
     *        required=true,
     *        in="path",
     *        @OA\Schema(
     *            type="integer"
     *        )
     *     ),
     *     @OA\RequestBody (
     *     required=true,
     *     @OA\MediaType(
     *     mediaType="application/json",
     *     @OA\Schema(
     *     type="object",
     *     @OA\Property(property="event_name", type="string", example="Updated event"),
     *     @OA\Property(property="begin_time", type="string", format="date-time")
     *     )
     *     )
     *     ),
     *      description="Return a event by given id",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function update_event($id, Request $request)
    {

    }
}
