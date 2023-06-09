<?php

namespace Tests\Unit\Models;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a student
     *
     * @return void
     */
    public function testCreateStudent()
    {

        $student = Student::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
        ]);

        $this->assertDatabaseHas((new Student)->getTable(), [
            'id' => $student->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
        ]);
    }
}
