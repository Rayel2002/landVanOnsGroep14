<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'eventName' => $this->event_name,
            'beginTime' => $this->begin_time,
            'endTime' => $this->end_time,
            'streetName' => $this->street_name,
            'houseNumber' => $this->house_number,
            'postalCode' => $this->postal_code,
            'amountOfVolunteersNeeded' => $this->amount_of_volunteers_needed,
            'description' => $this->description,
        ];
    }
}
