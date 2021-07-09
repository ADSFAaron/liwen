<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use \App\Models\Category;

class CourseList extends Component
{
    public $categories;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.course.course-list')->layout('layouts.base');
    }
}
