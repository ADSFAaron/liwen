<?php

namespace Database\Factories;

use App\Models\Homework;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Homework::class;

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
        ];
    }
}
