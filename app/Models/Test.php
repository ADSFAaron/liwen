<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = "tests";

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function published_user()
    {
        return $this->belongsTo(User::class, 'published_user_id');
    }

    public function test_urls()
    {
        return $this->hasMany(TestUrl::class, 'test_id');
    }

}
