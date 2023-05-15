<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $students = Student::with(['parent', 'optedCourses'])->get();
        return view('index', compact('students'));
    }

    public function updateStatus(Request $request)
    {
        $student = Student::findOrFail($request->input('student_id'));
        $student->is_active = $request->input('is_active');
        $student->save();

        return response()->json(['success' => true]);
    }
}
