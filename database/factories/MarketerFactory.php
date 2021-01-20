<?php

namespace Database\Factories;

use App\Models\Marketer;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marketer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function run()
    {
        Marketer::factory()
            ->times(50)
            ->create();
    }
    public function definition()
    {
        return [
            //
            'Name' => $this->faker->name,
            'ID' => $this->faker->ID,
            'Phone' => $this->faker->Phone,
            'address' => $this->faker->address,
        ];
    }
}
