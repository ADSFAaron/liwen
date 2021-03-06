<?php

namespace Database\Factories;

use App\Models\HandedInImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class HandedInImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HandedInImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(30),
            'description' => $this->faker->text(150),
            'path' => '/static/images/info-bg.jpg'
        ];
    }
}
