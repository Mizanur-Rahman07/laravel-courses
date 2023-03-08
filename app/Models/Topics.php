<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;
    function courses()
    {
        return $this->belongsToMany(Course::class, 'course_topics', 'topic_id', 'course_id');
    }
}