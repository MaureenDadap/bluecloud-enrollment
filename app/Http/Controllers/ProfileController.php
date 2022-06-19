<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use App\Models\Assessment;
use App\Models\Courses;
use App\Models\Student;
use App\Models\StudentCourses;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Student::find(session()->get('studentID'));
        $currentAY = AcademicSchedule::latest()->first()->id;
        $assessment = Assessment::where('student_id', $student->id)->where('academic_schedule_id', $currentAY)->latest()->first();

        $recordExists = 0;
        if ($assessment != null) {
            $recordExists = 1;
            $student_courses = StudentCourses::all()->where('assessment_id', $assessment->assessment_id);

            $course_ids = array();
            foreach ($student_courses as $course) {
                array_push($course_ids, $course->course_id);
            }

            //get course details from Courses table
            $courses = Courses::all()->whereIn('id', $course_ids);
        } else {
            $recordExists = 0;
            $courses = collect();
        }


        return view('pages.student.profile', compact('student', 'assessment', 'courses', 'recordExists'));
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->image != null) {
            $imageName = time() . '.' .  $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        } else {
            $imageName = null;
        }

        $student = Student::find($request->id);
        $user = User::where('id', $student->user_id)->first();

        $student->image = $imageName;
        $user->image = $imageName;


        $student->update();
        $user->update();

        return redirect('/student/profile')->with('success', 'Student details updated successfully');
    }
}
