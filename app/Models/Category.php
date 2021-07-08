<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }

}
