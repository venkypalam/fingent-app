<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use Response, Redirect;
use App;
use DateTime;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $students = StudentModel::all();
        $data = ['students' => $students];
        return view('student.student')->with($data);
    }  
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $student = new StudentModel();
        $student->name = request('name');
        $student->age = request('age');
        $student->gender = request('gender');
        $student->reporting_teacher = request('reporting_teacher');

        if($student->save()) {
            $data = ['message' => "Successfully added student data", 'status' => 'success', 'code' => '200'];
        } else {
            abort(500);
        }

        return back()->with($data);
    }


    public function editCreate($id) {
        $student = StudentModel::where('id', $id)->first();
        $data = ['student' => $student];

        return response()->json($data);
    }

    public function editSubmit(Request $request) {

        $student_id = request('id');
        $validated = $request->validate([
            'name' => 'required',

        ]);
        $student = StudentModel::find($student_id);    
        $student->name = request('name');
        $student->age = request('age');
        $student->gender = request('gender');
        $student->reporting_teacher = request('reporting_teacher');

        if( $student->save()) {
            $data = ['message' => "Successfully updated student data", 'status' => 'success', 'code' => '200'];
        } else {
            abort(500);
        }

        return back()->with($data);
    }
    public function delete($id) {
        $students = StudentModel::where('id', $id)->delete();
        return back();
    }
}
