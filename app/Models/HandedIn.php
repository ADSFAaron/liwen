<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandedIn extends Model
{
    use HasFactory;

    protected $table = 'handed_in';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class, 'homework_id');
    }

    public function graded_user()
    {
        return $this->belongsTo(User::class, 'graded_user_id');
    }

    public function handed_in_images()
    {
        return $this->hasMany(HandedInImage::class, 'handed_in_id');
    }

}
