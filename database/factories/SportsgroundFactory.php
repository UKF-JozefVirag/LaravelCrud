<?php

namespace Database\Factories;

use App\Models\Sportsground;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportsgroundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sportsground::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'area' => $this->faker->randomFloat(2, 30, 500),
        ];
    }
}
