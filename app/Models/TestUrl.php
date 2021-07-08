<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUrl extends Model
{
    use HasFactory;

    public function uploaded_user()
    {
        return $this->belongsTo(User::class, 'uploaded_user_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

}
