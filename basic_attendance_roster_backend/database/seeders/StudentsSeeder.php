<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students_json = json_decode(file_get_contents(__DIR__ . '/StudentsSeeder.json'), true);
        $students = [];
        foreach ($students_json as $student) {
            $students[] = [
                "id" =>  $student['Student ID'],
                "first_name" => $student['First Name'],
                "last_name" => $student['Last Name'],
                "email" => $student['Email']
            ];
        }
        
        DB::table( (new Student)->getTable() )->insert($students);
    }
}
