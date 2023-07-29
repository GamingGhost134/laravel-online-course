<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Loop to create multiple courses
        for ($i = 0; $i < 10; $i++) {
            $course = new Course();
            $course->title = $faker->sentence(4);
            $course->description = $faker->paragraph(3);
            $course->category = $faker->randomElement(['Development', 'Business', 'Finance', 'IT & Software', 'Office Productivity']);
            $course->duration = $faker->numberBetween(30, 300);
            $course->instructor = $faker->name;
            $course->price = $faker->randomFloat(2, 10, 200);
            $course->level = $faker->randomElement(['Beginner', 'Intermediate', 'Advanced']);
            $course->language = $faker->randomElement(['English', 'Spanish', 'French']);
            $course->is_published = $faker->boolean;

            // Generate random image name and associate it with the course
            $imageName = $faker->unique()->image('public/uploads/course/images', 640, 480, null, false);
            $course->image= $imageName;
            $course->save();
        }
    }
}
