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
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'  => fake()->userName(),
            'fullname' => fake()->name(),
            'address' => fake()->address(),
            'phone' => "03".random_int(11111111,99999999),
            'cccd' => "0".random_int(11111111,99999999),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'email_verified_at' => now(),
            'sex' => random_int(0,2),
            'birthday' => fake()->date(),
            'image' => fake()->imageUrl(),
            'qrcode' => fake()->imageUrl(),
            'status' => random_int(0,1),
            'password' => static::$password ??= Hash::make('password'),
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
