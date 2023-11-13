<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => fake()->name(),
            'begin_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(),
            'street_name' => fake()->streetName(),
            'house_number' => fake()->buildingNumber(),
            'postal_code' => fake()->postcode(),
            'amount_of_volunteers_needed' => fake()->numberBetween(0, 100),
            'description' => fake()->text(500)
        ];
    }
}
