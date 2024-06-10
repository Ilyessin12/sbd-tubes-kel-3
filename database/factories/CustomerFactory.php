<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'nama_customer' => $this->faker->name(),
            'email_customer' => $this->faker->unique()->safeEmail(),
            'telp_customer' => $this->faker->phoneNumber(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'status_member' => $this->faker->randomElement(['member', 'non-member']),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
            'role' => $this->faker->randomElement(['admin', 'user']),
            'kuota_member' => $this->faker->randomNumber(),
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