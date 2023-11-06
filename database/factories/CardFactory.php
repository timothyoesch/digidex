<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $email = $this->faker->email();
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        return [
            "uuid" => \Illuminate\Support\Str::uuid(),
            "name" => $first_name . " " . $last_name,
            "First_Name" => $first_name,
            "Last_Name" => $last_name,
            "Email" => $email,
            "Phone" => $this->faker->phoneNumber(),
            "image" => hash("sha256", strtolower($email)),
            "user_id" => 1,
        ];
    }
}
