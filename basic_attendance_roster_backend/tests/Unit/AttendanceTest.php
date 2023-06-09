<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\QueryException;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating an attendance record.
     *
     * @return void
     */
    public function testCreateAttendance()
    {
        $today = now();
        $tomorrow = $today->copy()->addDay();

        $course1 = Course::create([
            'code_name' => 'Course Example 1',
        ]);

        $course2 = Course::create([
            'code_name' => 'Course Example 2',
        ]);

        $student1 = Student::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
        ]);
        $student2 = Student::create([
            'first_name' => 'John2',
            'last_name' => 'Doe2',
            'email' => 'johndoe2@example.com',
        ]);


        $attendance1 = Attendance::create([
            'student_id' => $student1->id,
            'course_id' => $course1->id,
            'date' => $today,
            'status' => 'present',
        ]);

        $attendance2 = Attendance::create([
            'student_id' => $student2->id,
            'course_id' => $course2->id,
            'date' => $today,
            'status' => 'absent',
        ]);

        Attendance::create([
            'student_id' => $student2->id,
            'course_id' => $course2->id,
            'date' => $tomorrow,
            'status' => 'present',
        ]);


        $this->assertDatabaseHas((new Attendance)->getTable(), [
            'id' => $attendance1->id,
            'student_id' => $student1->id,
            'course_id' => $course1->id,
            'date' => $today->format('Y-m-d'),
            'status' => 'present',
        ]);

        $this->assertDatabaseHas((new Attendance)->getTable(), [
            'id' => $attendance2->id,
            'student_id' => $student2->id,
            'course_id' => $course2->id,
            'date' => $today->format('Y-m-d'),
            'status' => 'absent',
        ]);
        $this->assertCount(2, Attendance::where('course_id', $course2->id)->get());

        $this->expectException(QueryException::class);
        Attendance::create([
            'student_id' => $student2->id,
            'course_id' => $course2->id,
            'date' => $tomorrow,
            'status' => 'wrong status',
        ]);
    }
}
