<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nis' => fake() -> numerify(),
            'nama' => fake() -> name(),
            'kelas' => fake() -> numberBetween(1,4),
            'tanggal_lahir' => fake() -> dateTime(),
            'alamat' => fake() -> streetAddress()  ,
        ];
    }
}
