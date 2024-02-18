<?php

namespace Database\Factories;

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
            'username'  => $username = fake()->userName(),
            'fullname' => fake()->name(),
            'password' => $pass = Hash::make('password'),
            'email' => $email = fake()->unique()->safeEmail(),
            'phone' => "03".random_int(11111111,99999999),
            'cccd' => "0".random_int(11111111111,99999999999),
            'email_verified_at' => now(),
            'sex' => random_int(0,2),
            'address' => fake()->address(),
            'birthday' => fake()->date(),
            'image' => fake()->imageUrl(),
            'qrcode' => $username.";".$email.";".$pass,
            'status' => random_int(0,1),
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
