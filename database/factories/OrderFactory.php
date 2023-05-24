<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'credit_card_number' => $this->faker->creditCardNumber(),
            'credit_card_expiration_date' => $this->faker->creditCardExpirationDate(),
            'total' => $this->faker->randomFloat(2, 0, 999999.99),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'declined', 'refunded']),
            'notes' => $this->faker->text()
        ];
    }
}
