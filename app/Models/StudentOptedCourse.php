<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOptedCourse extends Model
{
    use HasFactory;

    // Relation with Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    // Relation with Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
