<?php

namespace Database\Seeders;

// use App\Livewire\Admin\Portfolios;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;


class PorfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $portfolios = [
            [
                'id' => 1,
                'author_id' => 1,
                'title' => 'Learning Management System LMS (LARAVEL 11)',
                'slug' => Str::slug('Learning Management System LMS (LARAVEL 11)'),
                'featured_image' => '1763817944_portfolio-square-3.jpg',
                'overview' => '
                    This is a Learning Management System project developed as part of my thesis at Norton University. The project is designed for a school called CAITD, located in Cambodia, with the purpose of providing online courses to students.
                ',
                'strategy' => 'Strategy details for project 1.',
                'project_type' => 'Type of project 1.',
                'client' => 'Client 1',
                'content' => 'Main content for project 1.',
                'project_challenge' => 'Challenges faced in project 1.',
                'design_research' => 'Design research conducted for project 1.',
                'design_approach' => 'Design approach used in project 1.',
                'the_solution' => 'Solutions provided in project 1.',
                'created_at' => Date::now(),
                'updated_at' => Date::now(),
            ],
        ];

        foreach ($portfolios as $data) {
            Portfolio::create($data);
        }

    }



    // public function run(): void
    // {
    //     // Paths
    //     $sourcePath = public_path('images/portfolio_resourse'); // Source folder for random images
    //     $destinationPath = public_path('images/portfolios'); // Destination folder for post images
    //     $resizedPath = $destinationPath . '/resized'; // Folder for resized images

    //     // Get all images from the source folder
    //     $images = File::files($sourcePath);

    //     // If no images exist, return early
    //     if (count($images) === 0) {
    //         return;
    //     }

    //     // Ensure the destination directories exist
    //     if (!File::isDirectory($destinationPath)) {
    //         File::makeDirectory($destinationPath, 0777, true, true);
    //     }
    //     if (!File::isDirectory($resizedPath)) {
    //         File::makeDirectory($resizedPath, 0777, true, true);
    //     }

    //     $portfolios = [];

    //     for ($i = 1; $i <= 100; $i++) {
    //         $portfolios[] = [
    //             'author_id' => User::first()->id, // Assuming you have at least one user
    //             'title' => "{$i}th Project",
    //             'overview' => "Overview of project {$i}.",
    //             'strategy' => "Strategy details for project {$i}.",
    //             'project_type' => "Type of project {$i}.",
    //             'client' => "Client {$i}",
    //             'content' => "Main content for project {$i}.",
    //             'project_challenge' => "Challenges faced in project {$i}.",
    //             'design_research' => "Design research conducted for project {$i}.",
    //             'design_approach' => "Design approach used in project {$i}.",
    //             'the_solution' => "Solutions provided in project {$i}."
    //         ];
    //     }

    //     foreach ($portfolios as $postData) {
    //         // Pick a random image for each post inside the loop
    //         $randomImage = $images[array_rand($images)];
    //         $originalFilename = $randomImage->getFilename();
    //         $newFilename = time() . '_' . $originalFilename; // Unique filename

    //         // Copy the image to the posts folder
    //         File::copy($randomImage->getPathname(), $destinationPath . '/' . $newFilename);

    //         // Generate Thumbnail (1:1 Aspect Ratio)
    //         Image::make($destinationPath . '/' . $newFilename)
    //             ->fit(250, 250)
    //             ->save($resizedPath . '/thumb_' . $newFilename);

    //         // Generate Resized Image (1.6 Aspect Ratio)
    //         Image::make($destinationPath . '/' . $newFilename)
    //             ->fit(512, 320)
    //             ->save($resizedPath . '/resized_' . $newFilename);

    //         // Add the random image filename to the post data
    //         $postData['featured_image'] = $newFilename; // Store the relative path

    //         // Create the post
    //         Portfolio::create($postData);
    //     }
    // }


}
