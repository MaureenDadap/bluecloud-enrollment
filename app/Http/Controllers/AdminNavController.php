<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminNavController extends Controller
{
    public function compose(View $view)
    {
        $schedule = '';
        $sched = AcademicSchedule::latest()->first();
        $schedule = $sched->year_start .' - '. $sched->year_end .', Term '. $sched->term;

        $view->with('schedule', $schedule);
    }
}
