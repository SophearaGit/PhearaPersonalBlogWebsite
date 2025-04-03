<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParentCategory>
 */
class ParentCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $categories = [
        "Web Development",
        "Frontend Development",
        "Backend Development",
        "Full Stack Development",
        "Mobile App Development",
        "Software Engineering",
        "Database Management",
        "Object-Oriented Programming",
        "Frameworks & Libraries",
        ];

        return [
            'name' => array_shift($categories),
        ];
    }
}
