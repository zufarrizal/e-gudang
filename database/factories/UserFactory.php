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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => fake()->randomElement(['Super Admin', 'Admin', 'User']),
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

class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->word(),
        ];
    }

    public function nama_kategori($nama_kategori)
    {
        return $this->state(function (array $attributes) use ($nama_kategori) {
            return [
                'nama_kategori' => $nama_kategori,
            ];
        });
    }
}

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->word(),
            'kategori_id' => fake()->numberBetween(1, 10),
            'harga' => fake()->numberBetween(10000, 100000),
            'satuan' => fake()->randomElement(['pcs', 'box', 'kg', 'liter']),
            'stok' => fake()->numberBetween(1, 100),
        ];
    }

    public function nama_barang($nama_barang)
    {
        return $this->state(function (array $attributes) use ($nama_barang) {
            return [
                'nama_barang' => $nama_barang,
            ];
        });
    }
    
    public function kategori_id($kategori_id)
    {
        return $this->state(function (array $attributes) use ($kategori_id) {
            return [
                'kategori_id' => $kategori_id,
            ];
        });
    }
}