<?php

namespace Database\Factories;

use App\Models\AcademicSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $assessment_id = substr(str_shuffle('0123456789'), 1, 11);
        $acadSchedID = AcademicSchedule::latest()->first()->id;
        static $studentID = 1;


        return [
            'student_id' => $studentID++,
            'assessment_id' => $assessment_id++,
            'academic_schedule_id' => $acadSchedID,
            'total_units' => 15,
            'unit_price' => 200.00,
            'total_unit_price' => 400.00,
            'misc_price' => 5000.00,
            'total_price' => 5400.00,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ];
    }
}
