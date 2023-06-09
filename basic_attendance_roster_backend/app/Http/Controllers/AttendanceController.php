<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Attendance::where([
            ['course_id', '=',$request->get('course_id')],
            ['date', '=', now()->format('Y-m-d')],
        ])->get();
    }
    /**
     * Dolore ipsum voluptate amet commodo aliquip ex duis laboris.
     */
    public function create(StoreAttendanceRequest $request)
    {
        $date = now()->format('Y-m-d');
        $course = Course::findOrFail($request->get('course_id'));
        $student = Student::findOrFail($request->get('student_id'));

        $attendance = Attendance::where([
            ['course_id', '=', $course->id],
            ['student_id', '=', $student->id],
            ['date', '=', $date],
        ])->first();
        if($attendance)
            $attendance->update([
                'status' => $request->get('status'),
            ]);
        else
            $attendance = Attendance::create([
                'course_id' => $course->id,
                'student_id' =>  $student->id,
                'date' => $date,
                'status' => $request->get('status'),
            ]);

        return response($attendance, Response::HTTP_OK);
    }
}
