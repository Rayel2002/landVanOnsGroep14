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
            'event_name' => $this->event_name,
            'begin_time' => $this->begin_time,
            'end_time' => $this->end_time,
            'street_name' => $this->street_name,
            'house_number' => $this->house_number,
            'postal_code' => $this->postal_code,
            'amount_of_volunteers_needed' => $this->amount_of_volunteers_needed,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
