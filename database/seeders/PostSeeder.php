<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Paths
        $sourcePath = public_path('images/course'); // Source folder for random images
        $destinationPath = public_path('images/posts'); // Destination folder for post images
        $resizedPath = $destinationPath . '/resized'; // Folder for resized images

        // Get all images from the source folder
        $images = File::files($sourcePath);

        // If no images exist, return early
        if (count($images) === 0) {
            return;
        }

        // Ensure the destination directories exist
        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }
        if (!File::isDirectory($resizedPath)) {
            File::makeDirectory($resizedPath, 0777, true, true);
        }

        $faker = \Faker\Factory::create();

        // Array of posts data
        $posts = [
            // LARAVEL CATEGORY PART
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Mastering Laravel Eloquent Relationships',
                // 'slug' => Str::slug('Mastering Laravel Eloquent Relationships'),
                'content' => 'Eloquent, Laravel\'s ORM, provides a powerful way to manage database relationships. This post will dive deep into the different types of relationships in Eloquent, such as one-to-one, one-to-many, many-to-many, and polymorphic relationships. You\'ll learn how to define and utilize these relationships in your Laravel applications.',
                'tags' => 'Laravel, Eloquent, Database, Relationships, ORM',
                'meta_keywords' => 'laravel eloquent, database relationships, one-to-one, one-to-many, many-to-many, polymorphic',
                'meta_description' => 'Explore the different types of relationships in Laravel\'s Eloquent ORM and learn how to leverage them in your web applications.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Building a RESTful API with Laravel',
                'content' => 'In this tutorial, you\'ll learn how to build a RESTful API using Laravel. We\'ll cover topics such as route definitions, resource controllers, API versioning, authentication, and response formatting. By the end of this post, you\'ll have a solid understanding of how to create a robust and scalable API with Laravel.',
                'tags' => 'Laravel, API, RESTful, Web Services, Backend Development',
                'meta_keywords' => 'laravel api, restful api, web services, backend development, api versioning',
                'meta_description' => 'Discover how to build a RESTful API using Laravel, including route definitions, resource controllers, authentication, and more.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Deploying Laravel Applications with Docker',
                'content' => 'Docker is a powerful tool for containerizing and deploying web applications. In this guide, you\'ll learn how to package a Laravel application and its dependencies into a Docker container, and then deploy the containerized application to a production environment. We\'ll cover topics such as Dockerfile configuration, Docker Compose, and best practices for deploying Laravel apps with Docker.',
                'tags' => 'Laravel, Docker, Deployment, Containerization, DevOps',
                'meta_keywords' => 'laravel docker, containerization, web application deployment, devops, docker compose',
                'meta_description' => 'Learn how to package and deploy your Laravel applications using Docker, including Dockerfile configuration and Docker Compose.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Optimizing Laravel Performance: Caching and Queuing',
                'content' => 'Performance is a critical aspect of any web application. In this post, we\'ll explore two powerful features in Laravel - caching and queuing - and how they can be used to optimize the performance of your Laravel applications. You\'ll learn about different caching strategies, setting up a Redis-based cache, and leveraging Laravel\'s queuing system to handle time-consuming tasks asynchronously.',
                'tags' => 'Laravel, Performance, Caching, Queuing, Redis, Asynchronous Processing',
                'meta_keywords' => 'laravel performance, caching, queuing, redis, asynchronous processing, web application optimization',
                'meta_description' => 'Discover how to optimize the performance of your Laravel applications using caching and queuing techniques, including Redis-based caching and asynchronous task processing.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Implementing Authentication in Laravel with Sanctum',
                'content' => 'Sanctum is a lightweight authentication package for Laravel that provides a simple, token-based authentication system for your API and SPA applications. In this post, you\'ll learn how to set up Sanctum, create API tokens, and secure your Laravel application\'s routes and endpoints using Sanctum\'s powerful features.',
                'tags' => 'Laravel, Authentication, Sanctum, API, SPA, Token-based Authentication',
                'meta_keywords' => 'laravel sanctum, api authentication, spa authentication, token-based authentication, web application security',
                'meta_description' => 'Explore how to implement authentication in your Laravel applications using the Sanctum package, including token-based authentication for APIs and SPAs.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Building a Real-Time Chat Application with Laravel and WebSockets',
                'content' => 'In this tutorial, you\'ll learn how to build a real-time chat application using Laravel and WebSockets. We\'ll cover the setup of a WebSocket server, integrating it with a Laravel backend, and building a responsive front-end user interface using a JavaScript framework like Vue.js or React. By the end of this post, you\'ll have a solid understanding of how to create real-time, bidirectional communication in your web applications.',
                'tags' => 'Laravel, WebSockets, Real-Time, Chat Application, Vue.js, React',
                'meta_keywords' => 'laravel websockets, real-time chat application, bidirectional communication, vue.js, react, web application development',
                'meta_description' => 'Discover how to build a real-time chat application using Laravel and WebSockets, including server setup, backend integration, and front-end development.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Implementing Soft Deletes in Laravel Eloquent',
                'content' => 'Soft deletes is a powerful feature in Laravel Eloquent that allows you to "soft delete" records instead of permanently removing them from the database. In this post, you\'ll learn how to set up soft deletes, retrieve both soft-deleted and active records, and use the Trashed scope to filter your queries. We\'ll also discuss the benefits of soft deletes and best practices for implementing this feature in your Laravel applications.',
                'tags' => 'Laravel, Eloquent, Soft Deletes, Database, Data Retention',
                'meta_keywords' => 'laravel soft deletes, eloquent soft deletes, database data retention, record archiving, web application development',
                'meta_description' => 'Explore how to implement soft deletes in your Laravel Eloquent models, including retrieving soft-deleted records and using the Trashed scope.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Integrating Laravel with a Third-Party API',
                'content' => 'Integrating with third-party APIs is a common requirement for many web applications. In this post, you\'ll learn how to integrate your Laravel application with a third-party API, such as a payment gateway, weather service, or social media platform. We\'ll cover topics like making HTTP requests, handling responses, and managing API authentication and authorization.',
                'tags' => 'Laravel, API Integration, Third-Party APIs, HTTP Requests, Authentication, Authorization',
                'meta_keywords' => 'laravel api integration, third-party api, http requests, api authentication, api authorization, web application development',
                'meta_description' => 'Discover how to integrate your Laravel application with third-party APIs, including making HTTP requests, handling responses, and managing authentication and authorization.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Implementing Localization and Internationalization in Laravel',
                'content' => 'Localization and internationalization are essential features for web applications that cater to a global audience. In this post, you\'ll learn how to implement localization and internationalization in your Laravel applications. We\'ll cover topics such as translating content, handling date and time formats, and providing language-specific URLs.',
                'tags' => 'Laravel, Localization, Internationalization, Translations, Globalization, Multilingual',
                'meta_keywords' => 'laravel localization, laravel internationalization, translations, multilingual web applications, globalization, web development',
                'meta_description' => 'Explore how to implement localization and internationalization in your Laravel applications, including translating content, handling date and time formats, and providing language-specific URLs.',
                'visibility' => 1
            ],
            [
                'author_id' => User::first()->id,
                'category' => 10,
                'title' => 'Securing Laravel Applications with Two-Factor Authentication',
                'content' => 'Two-factor authentication (2FA) is a crucial security feature for modern web applications. In this post, you\'ll learn how to implement two-factor authentication in your Laravel applications using the Laravel Fortify package. We\'ll cover setting up 2FA, integrating with third-party 2FA providers, and providing a seamless user experience for your application\'s users.',
                'tags' => 'Laravel, Security, Two-Factor Authentication, 2FA, Fortify, User Authentication',
                'meta_keywords' => 'laravel two-factor authentication, 2fa, laravel fortify, web application security, user authentication, multi-factor authentication',
                'meta_description' => 'Discover how to secure your Laravel applications with two-factor authentication using the Laravel Fortify package, including integration with third-party 2FA providers.',
                'visibility' => 1
            ]
        ];


        // Loop through the posts array and create each post
        foreach ($posts as $postData) {
            // Pick a random image for each post inside the loop
            $randomImage = $images[array_rand($images)];
            $originalFilename = $randomImage->getFilename();
            $newFilename = time() . '_' . $originalFilename; // Unique filename

            // Copy the image to the posts folder
            File::copy($randomImage->getPathname(), $destinationPath . '/' . $newFilename);

            // Generate Thumbnail (1:1 Aspect Ratio)
            Image::make($destinationPath . '/' . $newFilename)
                ->fit(250, 250)
                ->save($resizedPath . '/thumb_' . $newFilename);

            // Generate Resized Image (1.6 Aspect Ratio)
            Image::make($destinationPath . '/' . $newFilename)
                ->fit(512, 320)
                ->save($resizedPath . '/resized_' . $newFilename);

            // Add the random image filename to the post data
            $postData['featured_image'] = $newFilename; // Store the relative path

            // Create the post
            Post::create($postData);
        }

    }
}
