<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    public function granted_users()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class, 'course_id');
    }

    public function tests()
    {
        return $this->hasMany(Test::class, 'course_id');
    }

    public function course_videos()
    {
        return $this->hasMany(CourseVideo::class, 'course_id');
    }

}
