<?php

namespace App\Http\Livewire\Course;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use \App\Models\Category;

class CourseList extends Component
{
    public $categories = [];

    public function render()
    {
        $user_has_course = Auth::user()->has_course;
        $user_course = explode(",", $user_has_course);

        foreach ($user_course as $c) {
            $tmp = Category::where('id', strval($c))->first();
            array_push($this->categories, $tmp);
        }

//        dd($this->categories);

        return view('livewire.course.course-list')->layout('layouts.base');
    }
}
