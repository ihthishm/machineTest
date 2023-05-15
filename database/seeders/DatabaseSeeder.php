<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Parent;
use App\Models\Student;
use App\Models\StudentOptedCourse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insert parents
        Parent::create([
            'name' => 'John',
            'email' => 'John@gmail.com'
        ]);
        Parent::create([
            'name' => 'Tom',
            'email' => 'Tom2@gmail.com'
        ]);
        Parent::create([
            'name' => 'Joy',
            'email' => 'bin@Jon.com'
        ]);
        Parent::create([
            'name' => 'Adam',
            'email' => 'Adam@Yahoo.com'
        ]);
        Parent::create([
            'name' => 'Dennis',
            'email' => 'Den@gmail.com'
        ]);

          // Insert students
          Student::create([
            'name' => 'Anju',
            'fk_parent_id' => 1,
            'gender' => 'F'
        ]);
        Student::create([
            'name' => 'Alex',
            'fk_parent_id' => 2,
            'gender' => 'M'
        ]);
        Student::create([
            'name' => 'Rols',
            'fk_parent_id' => 2,
            'gender' => 'M'
        ]);
        Student::create([
            'name' => 'David',
            'fk_parent_id' => 3,
            'gender' => 'M'
        ]);
        Student::create([
            'name' => 'Abi',
            'fk_parent_id' => 4,
            'gender' => 'M'
        ]);
        Student::create([
            'name' => 'Jinu',
            'fk_parent_id' => 5,
            'gender' => 'F'
        ]);
        Student::create([
            'name' => 'Aju',
            'fk_parent_id' => 5,
            'gender' => 'M'
        ]);

        // Insert courses
        Course::create([
            'course_name' => 'English',
            'dept' => 'English'
        ]);
        Course::create([
            'course_name' => 'Mathematics',
            'dept' => 'Maths'
        ]);
        Course::create([
            'course_name' => 'Science',
            'dept' => 'Science'
        ]);
        Course::create([
            'course_name' => 'Economics',
            'dept' => 'Science'
        ]);

        // Insert student_opted_courses
        StudentOptedCourse::create([
            'student_id' => 1,
            'course_id' => 1,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 1,
            'course_id' => 4,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 2,
            'course_id' => 1,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 3,
            'course_id' => 2,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 3,
            'course_id' => 4,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 4,
            'course_id' => 2,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 4,
            'course_id' => 1,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 4,
            'course_id' => 3,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 5,
            'course_id' => 3,
            'is_active' => 0
        ]);
        StudentOptedCourse::create([
            'student_id' => 6,
            'course_id' => 2,
            'is_active' => 0
        ]);
        StudentOptedCourse::create(['student_id' => 6,
        'course_id' => 2,
        'is_active' => 0
    ]);
    StudentOptedCourse::create([
        'student_id' => 7,
        'course_id' => 1,
        'is_active' => 0
    ]);
    }
}
