<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;


class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Clearance::select(
                'clearances.id',
                'students.student_id as student_id',
                'students.last_name as last_name',
                'students.first_name as first_name',
                'clearances.office as office',
                'clearances.remarks as remarks'
            )
                ->join(
                    'students',
                    'clearances.student_id',
                    '=',
                    'students.id'
                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <a class="btn btn-success deleteClearance" data-clearanceid="' . $row['id'] . '" href="#" data-bs-toggle="modal"
                    data-bs-target="#confirmModal"><i class="bi-check-circle text-white" title="Resolve"></i> Resolve</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.clearances');
    }

    public function studentIndex()
    {
        $student = Student::find(session('studentID'));
        $clearances = Clearance::where('student_id', $student->id)->get();
        $notCleared = 0;

        if ($clearances != null && $clearances->count() > 0)
            $notCleared = 1;

        return view('pages.student.clearance', compact('student', 'clearances', 'notCleared'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student = Student::find($id);
        return view('pages.admin.clearance-new', compact('student'));
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
            'office' => 'required'
        ]);

        $remarks = $request->get('remarks');

        if ($remarks == 'Other')
            $remarks = $request->get('other-remarks');

        Clearance::create([
            'student_id' => $request->get('id'),
            'office' => $request->get('office'),
            'remarks' => $remarks
        ]);

        return redirect('/admin/clearances')->with('success', 'Clearance accountability has been added');
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
        return view('pages.admin.clearance-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clearances = Clearance::find($id);
        $clearances->delete();
        return redirect('/admin/clearances')->with('success', 'Clearance accountability deleted successfully');
    }
}
