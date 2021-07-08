<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkImage extends Model
{
    use HasFactory;

    public function uploaded_user()
    {
        return $this->belongsTo(User::class, 'uploaded_user_id');
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class, 'homework_id');
    }
}
