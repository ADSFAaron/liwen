<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

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
            'date' => $this->faker->date(),
            'lecture' => $this->faker->text(10),
            'lesson' => $this->faker->numberBetween(1,20),
            'slug' => $this->faker->uuid()
        ];
    }
}
