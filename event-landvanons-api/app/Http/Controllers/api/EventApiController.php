<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use http\Env\Response;
use Illuminate\Http\Request;
use Mockery\Exception;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use App\Services\EventsFilter;

// A tutorial how to build a REST API in laravel
//https://www.youtube.com/watch?v=YGqCZjdgJJk

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
//        $filter = new EventsFilter();
//        $queryItems = $filter->transform($request);
//
//        if(count($queryItems) == 0) {
            return new EventCollection(Event::paginate());
//        } else {
//            return new EventCollection(Event::where($queryItems)->paginate());
//        }
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
     *      summary="Create a Events",
     *     @OA\RequestBody (
     *     required=true,
     *     @OA\JsonContent(
     *     type="object",
     *     @OA\Property(property="event_name", type="string", example="Updated event"),
     *     @OA\Property(property="begin_time", type="string", format="date-time"),
     *     @OA\Property(property="end_time", type="string", format="date-time"),
     *     @OA\Property(property="street_name", type="string", example="street name"),
     *     @OA\Property(property="house_number", type="string", example="Updated house_number"),
     *     @OA\Property(property="postal_code", type="string", example="Updated postal code"),
     *     @OA\Property(property="amount_of_volunteers_needed", type="number", example=5),
     *     @OA\Property(property="descriptipn", type="string", example="Updated description"),
     *     )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *           @OA\Response(
     *           response=201,
     *           description="Successful created",
     *        ),
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

    public function store(Request $request){

        $validatedData = $request->validate([
            'event_name' => 'required|string',
            'begin_time' =>'required|date',
            'end_time' => 'required|date',
            'street_name' => 'required|string',
            'house_number' => 'required|string',
            'postal_code' => 'required|string',
            'amount_of_volunteers_needed' => 'required|integer',
            'description' => 'required|string'
        ]);

        Event::create($validatedData);

        // Return a response
        return response()->json(['message' => 'Post created successfully'], 201);
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
