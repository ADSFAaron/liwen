<?php

namespace Database\Factories;

use App\Models\TestUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestUrlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestUrl::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url()
        ];
    }
}
