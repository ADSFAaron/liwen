<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $grade;
    public $created_user_id;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, ['name' => 'required', 'slug' => 'required|unique:categories', 'grade' => 'required']);
    }

    public function storeCategory()
    {
        $this->validate(['name' => 'required', 'slug' => 'required|unique:categories', 'grade' => 'required']);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->grade = $this->grade;
        $category->created_user_id = Auth::user()->id;
        $category->save();
        session()->flash('message', '成功增加課程!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
