<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $childCategories = [
        // Web Development
        "HTML",
        "CSS",
        "JavaScript",
        "PHP",
        "Ruby on Rails",
        "ASP.NET",
        "Django",
        "Flask",
        "Node.js",
        "Next.js",
        // Frontend Development
        "React.js",
        "Vue.js",
        "Angular",
        "Svelte",
        "Bootstrap",
        "Tailwind CSS",
        "Material UI",
        "jQuery",
        "Lit",
        "Alpine.js",
        // Backend Development
        "Laravel",
        "Express.js",
        "Spring Boot",
        "FastAPI",
        "NestJS",
        "AdonisJS",
        "GraphQL",
        "Gin (Go)",
        "Flask",
        "Koa.js",
        // Full Stack Development
        "MERN Stack",
        "MEAN Stack",
        "LAMP Stack",
        "JAMstack",
        "T3 Stack",
        "RedwoodJS",
        "Blitz.js",
        "Nuxt.js",
        "Meteor.js",
        "Phoenix Framework"
        ];

        return [
            'name' => array_shift($childCategories),
            'parent' => $this->faker->numberBetween(1, 9),
        ];
    }
}
