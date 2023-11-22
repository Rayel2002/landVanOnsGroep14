<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use http\Env\Response;
use Illuminate\Http\Request;
use Mockery\Exception;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use App\Services\EventQuery;

class EventApiController extends Controller
{

    /**
     * @OA\Get (
     *      path="/api/v1/events",
     *      operationId="showEvents",
     *      tags={"Events"},
     *      summary="Show All Events",
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
    public function index(Request $request)
    {
        $filter = new EventQuery();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0) {
            return new EventCollection(Event::paginate());
        } else {
            return new EventCollection(Event::where($queryItems)->paginate());
        }
    }

    /**
     * @OA\Get (
     *      path="/api/v1/events/{id}",
     *      operationId="showEvent",
     *      tags={"Events"},
     *      summary="Show Event",
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
    public function show(Event $event)
    {
        try {
            $event_id = $event::find($event);
            if ($event_id != null) {
                return new EventResource($event);
            } else {
                return response()->json('Event is not found', 400);
            }
        } catch (\Exception $e) {
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
     * @OA\Post  (
     *      path="/api/v1/events",
     *      operationId="createEvent",
     *      tags={"Events"},
     *      summary="Update Events",
     *     @OA\RequestBody (
     *     required=true,
     *     @OA\MediaType(
     *     mediaType="application/json",
     *     @OA\Schema(
     *     type="object",
     *     @OA\Property(property="event_name", type="string", example="Updated event"),
     *     @OA\Property(property="begin_time", type="string", format="date-time"),
     *     @OA\Property(property="end_time", type="string", format="date-time"),
     *     @OA\Property(property="street_name", type="string", example="Updated event"),
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

    public function create(Request $request)
    {

        return response()->json(['message' => 'Event updated successfully']);
    }

    /**
     * @OA\Put  (
     *      path="/api/v1/events/{id}",
     *      operationId="updateEvent",
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
     *     @OA\Property(property="begin_time", type="string", format="date-time"),
     *     @OA\Property(property="end_time", type="string", format="date-time"),
     *     @OA\Property(property="street_name", type="string", example="Updated event"),
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

    public function update($id, Request $request)
    {
        $event = Event::find($id);
        $event->$request->input('event_name');
        $event->$request->input('begin_time');
        $event->$request->input('end_time');
        $event->$request->input('street_name');
        $event->$request->input('house_number');
        $event->$request->input('postal_code');
        $event->$request->input('amount_of_volunteers_needed');
        $event->$request->input('description');

        $event->update();
        return response()->json(['message' => 'Event updated successfully']);
    }

    /**
     * @OA\Delete   (
     *      path="/api/v1/events/{id}",
     *      operationId="deleteEvent",
     *      tags={"Events"},
     *      summary="Deleting Event",
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
    public function destroy($id, Request $request)
    {

    }
}
