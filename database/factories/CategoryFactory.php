<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['國文','英文','數學','自然','社會']),
            'grade' => $this->faker->randomElement(['一年級', '二年級', '三年級']),
            'slug' => $this->faker->uuid()
        ];
    }
}
