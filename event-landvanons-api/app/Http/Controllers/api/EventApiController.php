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
     * //     * @OA\Post(
     *      path="/api/v1/events",
     *      operationId="createEvent",
     *      tags={"Events"},
     *      summary="Create a Events",
     *     @OA\RequestBody (
     *     required=true,
     *     @OA\JsonContent(
     *     type="object",
     *     @OA\Property(property="eventName", type="string", example="Updated event"),
     *     @OA\Property(property="beginTime", type="string", format="date"),
     *     @OA\Property(property="endTime", type="string", format="date"),
     *     @OA\Property(property="streetName", type="string", example="street name"),
     *     @OA\Property(property="houseNumber", type="string", example="Updated house_number"),
     *     @OA\Property(property="postalCode", type="string", example="Updated postal code"),
     *     @OA\Property(property="amountOfVolunteersNeeded", type="number", example=5),
     *     @OA\Property(property="eventDescription", type="string", example="Updated description"),
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
     *     ),
     * )
     */

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'eventName' => 'required|string',
            'beginTime' => 'required|date',
            'endTime' => 'required|date',
            'streetName' => 'required|string',
            'houseNumber' => 'required|string',
            'postalCode' => 'required|string',
            'amountOfVolunteersNeeded' => 'required|integer',
            'eventDescription' => 'required|string'
        ]);

        $event = Event::create([
            'event_name' => $validatedData['eventName'],
            'begin_time' => $validatedData['beginTime'],
            'end_time' => $validatedData['endTime'],
            'street_name' => $validatedData['streetName'],
            'house_number' => $validatedData['houseNumber'],
            'postal_code' => $validatedData['postalCode'],
            'amount_of_volunteers_needed' => $validatedData['amountOfVolunteersNeeded'],
            'description' => $validatedData['eventDescription'],
        ]);

        return response()->json(['message' => 'Event successfully created'], 201);
    }

    /**
     * @OA\Put  (
     *      path="/api/v1/events/{id}",
     *      operationId="updateEvent",
     *      tags={"Events"},
     *      summary="Update Events",
     * @OA\Parameter(
     *        name="id",
     *        description="Event Category ID",
     *        example=1,
     *        required=true,
     *        in="path",
     *        @OA\Schema(
     *            type="integer"
     *        )
     *     ),
     *     @OA\RequestBody (
     *     required=true,
     *     @OA\JsonContent(
     *      type="object",
     *      @OA\Property(property="eventName", type="string"),
     *      @OA\Property(property="beginTime", type="string", format="date"),
     *      @OA\Property(property="endTime", type="string", format="date"),
     *      @OA\Property(property="streetName", type="string"),
     *      @OA\Property(property="houseNumber", type="string"),
     *      @OA\Property(property="postalCode", type="string"),
     *      @OA\Property(property="amountOfVolunteersNeeded", type="number"),
     *      @OA\Property(property="eventDescription", type="string"),
     *      )
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
        $validatedData = $request->validate([
            'eventName' => 'required|string',
            'beginTime' => 'required|date',
            'endTime' => 'required|date',
            'streetName' => 'required|string',
            'houseNumber' => 'required|string',
            'postalCode' => 'required|string',
            'amountOfVolunteersNeeded' => 'required|integer',
            'eventDescription' => 'required|string'
        ]);

        $event = Event::find($id);
        $event->update([
            'event_name' => $validatedData['eventName'],
            'begin_time' => $validatedData['beginTime'],
            'end_time' => $validatedData['endTime'],
            'street_name' => $validatedData['streetName'],
            'house_number' => $validatedData['houseNumber'],
            'postal_code' => $validatedData['postalCode'],
            'amount_of_volunteers_needed' => $validatedData['amountOfVolunteersNeeded'],
            'description' => $validatedData['eventDescription'],
        ]);
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
