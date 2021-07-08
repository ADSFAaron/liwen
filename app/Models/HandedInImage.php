<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandedInImage extends Model
{
    use HasFactory;

    protected $table = "handed_in_images";

    public function handed_in()
    {
        return $this->belongsTo(HandedIn::class, 'handed_in_id');
    }
}
