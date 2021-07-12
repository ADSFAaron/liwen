<?php

namespace App\Http\Livewire\Course;

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
        return view('livewire.course.course-detail')->layout('layouts.base');
    }
}
