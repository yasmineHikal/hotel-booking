<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RoomFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(4,true),
            'price' => fake()->randomFloat(2,100,900),
            'status' => fake()->randomElement([1, 2, 3]) ,
            'type' => fake()->randomElement([1, 2, 3]) ,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */

}
