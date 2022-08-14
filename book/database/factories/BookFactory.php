<?php

namespace Database\Factories;

use App\Domain\Book\Models\Book;
use App\Domain\Student\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'pic' => Str::random(10),
            'student_id' => $this->faker->randomElement(Student::all())['id'],
        ];
    }
}
