<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Review;
use App\Models\Series;
use App\Models\Topics;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // $series = ['Laravel', 'Javascript', 'PHP', 'Vue', 'React'];
        $series = [
            [
                'name' => 'Laravel',
                'image' => "https://laravel-courses.com/storage/series/54e8baab-727e-4593-a78a-e0c22c569b61.png",
            ],
            [
                'name' => 'Javascript',
                'image' => "https://laravel-courses.com/storage/series/c9cb9b3c-4d8c-4df6-a7b7-54047ce907ad.png",
            ],
            [
                'name' => 'PHP',
                'image' => "https://laravel-courses.com/storage/series/c9cb9b3c-4d8c-4df6-a7b7-54047ce907ad.png",
            ],
            [
                'name' => 'Vue',
                'image' => "https://laravel-courses.com/storage/series/c9cb9b3c-4d8c-4df6-a7b7-54047ce907ad.png",
            ],
            [
                'name' => 'React',
                'image' => "https://laravel-courses.com/storage/series/c9cb9b3c-4d8c-4df6-a7b7-54047ce907ad.png",
            ]
        ];
        foreach ($series as $item) {
            Series::create([
                'name' => $item['name'],
                'image' => $item['image']
            ]);
        }

        $topics = ['Eloquent', 'Validation', 'Authentication', 'Testing', 'Refactory'];
        foreach ($topics as $item) {
            Topics::create([
                'name' => $item,
            ]);
        }

        $platforms = ['Youtube', 'Google', 'Yahoo', 'Crome', 'Fire Fox'];
        foreach ($platforms as $item) {
            Platform::create([
                'name' => $item,
            ]);
        }

        Author::factory(50)->create();
        //create 50 users
        User::factory(50)->create();

        //create 100 course  
        Course::factory(100)->create();

        $courses = Course::all();
        foreach ($courses as $course) {
            $topics = Topics::all()->random(rand(1, 5))->pluck('id')->Array();
            $course->topics()->attach($topics);

            $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
            $course->authors()->attach($authors);

            $series = Series::all()->random(rand(1, 4))->pluck('id')->toArray();
            $course->series()->attach($series);
        }

        Review::factory(100)->create();
    }
}