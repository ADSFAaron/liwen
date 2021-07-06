<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class MyCourse extends Component
{
    public function render()
    {
        return view('livewire.course.my-course')->layout('layouts.base');
    }
}
