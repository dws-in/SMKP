<?php

namespace Database\Factories;

use App\Models\Tryout;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TryoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tryout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company. " Tryout",
            'description' => $this->faker->text(20),
            'held' => $this->faker->dateTime(),
            'user_id' => rand(1,10),
            'cluster_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
