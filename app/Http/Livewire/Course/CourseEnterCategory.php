<?php

namespace App\Http\Livewire\Course;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use \App\Models\Category;

class CourseEnterCategory extends Component
{
    public $category;
    public $courses;

    public function mount($category)
    {
        $this->category = $category;
        $this->courses = [];
    }

    public function render()
    {
        $user_has_course = Auth::user()->has_course;
        $user_course = explode(",", $user_has_course);
        $enter_category = Category::where('name', $this->category)->firstOrFail();

        // 確認使用者已經有在此課程內
        if (in_array($enter_category->id, $user_course)) {
            $this->courses = Category::where('name', $this->category)->firstOrFail()->courses()->get();
        }

        return view('livewire.course.course-enter-category')->layout('layouts.base');
    }
}
