<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        \App\Models\User::factory(2)->teacher()->create()->each( function($user) { // Teacher
            $user->categories()->save(\App\Models\Category::factory()->make());
            $user->categories()->each(function ($category) use ($user) {
                $category->courses()->saveMany([
                    \App\Models\Course::factory()->make(['created_user_id' => $user->id]),
                    \App\Models\Course::factory()->make(['created_user_id' => $user->id]),
                    \App\Models\Course::factory()->make(['created_user_id' => $user->id])
                ]);
                $category->courses()->each(function ($course) use ($user) {
                    $course->homeworks()->saveMany([
                        \App\Models\Homework::factory()->make(['published_user_id' => $user->id]),
                        \App\Models\Homework::factory()->make(['published_user_id' => $user->id]),
                        \App\Models\Homework::factory()->make(['published_user_id' => $user->id])
                    ]);
                    $course->homeworks()->each( function($homework) use ($user) {
                        $homework->homework_images()->saveMany([
                            \App\Models\HomeworkImage::factory()->make(['uploaded_user_id' => $user->id]),
                            \App\Models\HomeworkImage::factory()->make(['uploaded_user_id' => $user->id]),
                            \App\Models\HomeworkImage::factory()->make(['uploaded_user_id' => $user->id])
                        ]);
                    });

                    $course->tests()->saveMany([
                        \App\Models\Test::factory()->make(['published_user_id' => $user->id]),
                        \App\Models\Test::factory()->make(['published_user_id' => $user->id]),
                        \App\Models\Test::factory()->make(['published_user_id' => $user->id])
                    ]);
                    $course->tests()->each( function($test) use ($user) {
                        $test->test_urls()->saveMany([
                            \App\Models\TestUrl::factory()->make(['uploaded_user_id' => $user->id]),
                            \App\Models\TestUrl::factory()->make(['uploaded_user_id' => $user->id]),
                            \App\Models\TestUrl::factory()->make(['uploaded_user_id' => $user->id])
                        ]);
                    });

                    $course->course_videos()->saveMany([
                        \App\Models\CourseVideo::factory()->make(['uploaded_user_id' => $user->id]),
                        \App\Models\CourseVideo::factory()->make(['uploaded_user_id' => $user->id]),
                        \App\Models\CourseVideo::factory()->make(['uploaded_user_id' => $user->id])
                    ]);
                });
            });
        });
        \App\Models\User::factory(3)->student()->create()->each( function($user) { // Student
            \App\Models\Course::each(function ($course) use ($user) {
                $course->homeworks()->each( function($homework) use ($user) {
                    $homework->handed_in()->save(\App\Models\HandedIn::factory()->make(['user_id' => $user->id]));
                    $homework->handed_in()->each( function($handed_in) {
                        $handed_in->handed_in_images()->saveMany([
                            \App\Models\HandedInImage::factory()->make(),
                            \App\Models\HandedInImage::factory()->make(),
                            \App\Models\HandedInImage::factory()->make()
                        ]);
                    });
                });
            });
        });
        $teacher_id_for_grade = \App\Models\User::where('utype', '=', 'TEA')->first()->id;
        \App\Models\HandedIn::each( function($handed_in) use ($teacher_id_for_grade) {
            $handed_in->update(['graded_user_id' => $teacher_id_for_grade]);
        });
    }
}
