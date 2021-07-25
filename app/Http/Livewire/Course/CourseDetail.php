<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Support\Facades\Auth;
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
        $user_has_course = Auth::user()->has_course;
        $user_course = explode(",", $user_has_course);
        $enter_category = Category::where('name', $this->category_name)->firstOrFail();

        // 確認使用者已經有在此課程內
        if (in_array($enter_category->id, $user_course)) {
            $this->course = Category::where('name', $this->category_name)->firstOrFail()->courses()->where('name', $this->course_name)->firstOrFail();

            $course_video = CourseVideo::where('course_id', $this->course->id)->get();
        } else {
            $this->course = new Course();
            $course_video = [];
        }
        return view('livewire.course.course-detail', ['course_video' => $course_video])->layout('layouts.base');
    }
}
