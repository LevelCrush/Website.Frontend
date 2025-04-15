<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clan>
 */
class ClanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'group_id' => fake()->unique()->numberBetween(100000,111111),
            'slug' => fake()->slug(),
            'game' => 0,
            'active'=> true,
        ];
    }
}
