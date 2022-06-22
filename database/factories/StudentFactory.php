<?php

namespace Database\Factories;

use App\Models\AcademicSchedule;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $schoolYear = AcademicSchedule::latest()->first()->year_start;
        $programs = Program::all();
        $programsArr = array();

        foreach ($programs as $program) {
            array_push($programsArr, $program->code);
        }


        static $userID = 1;
        static $studentID = 1;

        // $userID = Student::latest()->first()->user_id;
        // if (!$userID) {
        //     $userID = 1;
        // }

        // $studentID = Student::latest()->first()->student_id;
        // if (!$studentID) {
        //     $studentID = 1;
        // }

        return [
            'user_id' => $userID++,
            'student_id' => $schoolYear . '-' . $studentID++,
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'birthdate' => '2022-06-15',
            'program' => $programsArr[array_rand($programsArr)],
            'year' => random_int(1, 4),
            'application_status' => 1,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ];
    }
}
