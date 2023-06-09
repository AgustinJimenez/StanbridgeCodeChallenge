<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a course
     *
     * @return void
     */
    public function testCreateCourse()
    {
        $course = Course::create([
            'code_name' => 'Course Example 1',
        ]);
        
        $this->assertDatabaseHas( (new Course)->getTable(), [
            'id' => $course->id,
            'code_name' => 'Course Example 1',
        ]);
    }
}
