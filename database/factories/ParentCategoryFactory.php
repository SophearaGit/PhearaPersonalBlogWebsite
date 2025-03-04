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
        "Programming Languages",
        "Web Development",
        "Frontend Development",
        "Backend Development",
        "Full Stack Development",
        "Mobile App Development",
        "Software Engineering",
        "Scripting Languages",
        "Game Development",
        "AI & Machine Learning",
        "Data Science & Analytics",
        "Cybersecurity & Ethical Hacking",
        "Embedded Systems & IoT",
        "Cloud Computing & DevOps",
        "Database Management",
        "Functional Programming",
        "Object-Oriented Programming",
        "Coding Best Practices",
        "Frameworks & Libraries",
        "Version Control & Collaboration"
        ];

        return [
            'name' => array_shift($categories),
        ];
    }
}
