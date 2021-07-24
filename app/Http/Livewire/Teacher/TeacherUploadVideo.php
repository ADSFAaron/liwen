<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Category;
use App\Models\Course;
use App\Models\CourseVideo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

//use function Sodium\add;

class TeacherUploadVideo extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $video_info = [];
    public $description;
    public $lesson;
    public $lesson_name;
    public $class_date;
    public $image;
    public $category_id;

    public function mount()
    {
        $this->class_date = Carbon::today()->toDateString();
        $this->video_info = [[
            'name' => '',
            'url' => '',
            'description' => ''
        ]];
    }

    public function generateSlug()
    {
        // Generate Chinese SLUG?
        $this->slug = Str::slug($this->name, '-');
    }

    public function addVideoField()
    {
        array_push($this->video_info, [
            'name' => '',
            'url' => '',
            'description' => ''
        ]);
    }

    public function removeVideoField($index)
    {
        unset($this->video_info[$index]);
        $this->video_info = array_values($this->video_info);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:courses',
            'description' => 'required',
            'lesson' => 'required|numeric',
            'lesson_name' => 'required',
            'class_date' => 'required|date',
//            'image' => 'mimes:jpeg,png',
            'category_id' => 'required'
        ]);
    }

    public function addCourse()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:courses',
            'description' => 'required',
            'lesson' => 'required|numeric',
            'lesson_name' => 'required',
            'class_date' => 'required|date',
//            'image' => 'mimes:jpeg,png',
            'category_id' => 'required'
        ]);

        $courses = new Course();
        $courses->category_id = $this->category_id;
        $courses->name = $this->name;
        $courses->slug = $this->slug;
        $courses->description = $this->description;
        $courses->date = $this->class_date;
        $courses->lecture = $this->lesson_name;
        $courses->lesson = $this->lesson;
        $courses->created_user_id = Auth::user()->id;

        // 保留後續增加封面圖片功能
//        if (!empty(Carbon::now()->timestamp)) {
//            if ($this->image != null) {
//                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
//                $this->image->storeAs('products', $imageName);
//                $courses->image = $imageName;
//            }
//        }
        $courses->save();

        foreach ($this->video_info as $video) {
            $course_video = new CourseVideo();
            $course_video->name = $video["name"];
            $course_video->url = $video["url"];
            $course_video->description = $video["description"];
            $course_id = Course::where('name', $this->name)->first();
//            @dump($course_id);
            $course_video->course_id = $course_id->id;
            $course_video->uploaded_user_id = Auth::user()->id;
            $course_video->save();
        }

        session()->flash('message', '成功增加課程!');
    }


    public function render()
    {
        // Check video info 用
//        info($this->video_info);
        $categories = Category::all();
        return view('livewire.teacher.teacher-upload-video', ['categories' => $categories])->layout('layouts.base');
    }
}
