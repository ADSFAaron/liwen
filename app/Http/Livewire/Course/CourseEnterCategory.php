<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use \App\Models\Category;

class CourseEnterCategory extends Component
{
    public $category;
    public $courses;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $this->courses = Category::where('name', $this->category)->firstOrFail()->courses()->get();
        return view('livewire.course.course-enter-category')->layout('layouts.base');
    }
}
