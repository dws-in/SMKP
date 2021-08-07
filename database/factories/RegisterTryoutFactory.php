<?php

namespace Database\Factories;

use App\Models\RegisterTryout;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisterTryoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RegisterTryout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => rand(1,10),
            'tryout_id' => rand(1,10),
            'user_name' => $this->faker->name(),
            'school_name' => $this->faker->company(),
            'graduation_date' => $this->faker->dateTime(),
            'phone_number' => $this->faker->phoneNumber(),
            'cluster_id' => rand(1,2),
        ];
    }
}
