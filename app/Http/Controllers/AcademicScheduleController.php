<?php

namespace App\Http\Controllers;

use App\Models\AcademicSchedule;
use Illuminate\Http\Request;

class AcademicScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = AcademicSchedule::latest()->first();
        return view('pages.admin.academic-year-settings', compact('schedule', 'schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'year_start' => 'required|integer|digits:4',
            'year_end' => 'required|integer|digits:4',
            'term' => 'required',
        ]);

        //get latest sched currently saved
        $schedule = AcademicSchedule::latest()->first();
        if ($request->year_start == $schedule->year_start && $request->term == $schedule->term) {
            return redirect('/admin/academic-schedule')->with('error', 'Schedule is the same as before.');
        } else {
            AcademicSchedule::create([
                'year_start' => $request->year_start,
                'year_end' => $request->year_end,
                'term' => $request->term,
            ]);

            return redirect('/admin/academic-schedule')->with('success', 'Academic year schedule updated successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'year_start' => 'required|integer|digits:4',
            'year_end' => 'required|integer|digits:4',
            'term' => 'required',
        ]);

        $schedule = AcademicSchedule::latest()->first();
        $schedule->year_start = $request->get('year_start');
        $schedule->year_end = $request->get('year_end');
        $schedule->term = $request->get('term');

        $schedule->update();

        return redirect('/admin/academic-schedule')->with('success', 'Academic year schedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
