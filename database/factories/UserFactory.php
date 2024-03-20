<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            $user = 'username'  => fake()->userName(),
            'fullname' => fake()->name(),
            $pass = 'password' => Hash::make('1234567'),
            $mail =  'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'position_id' => 1,
            'image' => fake()->imageUrl(),
            'qr_code' => Hash::make("username=?$user?email=?$mail?password=?$pass?"),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
