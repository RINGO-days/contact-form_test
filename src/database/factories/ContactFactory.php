<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastname,
            'first_name' => $this->faker->firstname,
            'gender' => $this->faker->numberBetween(0,2),
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'category_id'=> $this->faker->numberBetween(1,5),
            'detail' => $this->faker->realText(20),
        ];
    }
}
