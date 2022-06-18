<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Program::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editRoute = '/admin/programs/edit/' . $row['id'] . '';
                    $deleteRoute = '/admin/programs/delete/ ' . $row['id'] . '';

                    $btn = '<a class="btn btn-info" href="' . $editRoute . '"><i class="bi-pencil text-white"></i></a>
                    <a class="btn btn-danger" href="' . $deleteRoute . '"><i class="bi-trash"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.programs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.program-new');
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
            'code' => 'required|unique:programs',
            'name' => 'required|unique:programs'
        ]);

        $program = new Program([
            'code' => $request->get('code'),
            'name' => $request->get('name')
        ]);

        $program->save();
        return redirect('/admin/programs')->with('success', 'Program has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return view('pages.admin.program-edit', compact('program'));
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
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $program = Program::find($id);
        $countSameCode = Program::where('code', $request->code)->count();

        if ($countSameCode > 0) {
            if ($program->code == $request->code) {
                $program->name = $request->get('name');

                $program->update();

                return redirect('admin/programs')->with('success', 'Programs details updated successfully');
            } else
                return redirect('admin/programs')->with('error', 'Program code is already in use');
        } else {
            $program->code = $request->get('code');
            $program->name = $request->get('name');

            $program->update();

            return redirect('admin/programs')->with('success', 'Programs details updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect('/admin/programs')->with('success', 'Program deleted successfully');
    }
}
