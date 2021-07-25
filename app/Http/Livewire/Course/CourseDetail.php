<?php

namespace App\Http\Livewire\Course;

use App\Models\CourseVideo;
use Livewire\Component;
use \App\Models\Category;

class CourseDetail extends Component
{
    public $category_name;
    public $course_name;
    public $course;

    public function mount($category, $course)
    {
        $this->category_name = $category;
        $this->course_name = $course;
    }

    public function render()
    {
        $this->course = Category::where('name', $this->category_name)->firstOrFail()->courses()->where('name', $this->course_name)->firstOrFail();

        $course_video = CourseVideo::where('course_id', $this->course->id)->get();
//        dump($course_video);
        return view('livewire.course.course-detail', ['course_video' => $course_video])->layout('layouts.base');
    }
}
