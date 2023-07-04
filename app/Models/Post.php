<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $appends = ['image_url'];

    function getImageUrlAttribute()
    {
        return $this->image ? url('/uploads/' . $this->image) : "";
    }
}
