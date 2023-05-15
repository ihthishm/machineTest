<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function optedStudents()
    {
        return $this->hasMany(StudentOptedCourse::class, 'course_id', 'id');
    }
}
