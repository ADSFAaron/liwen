<?php

namespace Database\Factories;

use App\Models\HandedIn;
use Illuminate\Database\Eloquent\Factories\Factory;

class HandedInFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HandedIn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'score' => $this->faker->numberBetween(0,100)
        ];
    }
}
