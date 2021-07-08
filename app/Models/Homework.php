<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function published_user()
    {
        return $this->belongsTo(User::class, 'published_user_id');
    }

    public function homework_images()
    {
        return $this->hasMany(HomeworkImage::class, 'homework_id');
    }

    public function handed_in()
    {
        return $this->hasMany(HandedIn::class, 'homework_id');
    }
}
