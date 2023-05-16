<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Relationship with Parent
    public function parent()
    {
        return $this->belongsTo(Guardian::class, 'fk_parent_id', 'id');
    }

    // Relationship with StudentOptedCourse
    public function optedCourses()
    {
        return $this->hasMany(StudentOptedCourse::class, 'student_id', 'id');
    }
}
