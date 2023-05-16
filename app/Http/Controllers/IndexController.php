<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentOptedCourse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $optedCourse = StudentOptedCourse::with(['student.parent', 'course'])->get();
        return view('index', compact('optedCourse'));
    }

    public function updateStatus(Request $request)
    {
        $student = StudentOptedCourse::findOrFail($request->input('student_id'));
        $student->is_active = $request->input('is_active');
        $student->save();

        return response()->json(['success' => true]);
    }
}
