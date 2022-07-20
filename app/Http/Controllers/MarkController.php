<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentModel;
use App\Models\MarkModel;
use Response, Redirect;
use App;
use DateTime;

use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
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
        $marks = MarkModel::with('studentMarks')->get();
        $students = StudentModel::all();
        $data = ['marks' => $marks, 'students' => $students];
        return view('mark.mark')->with($data);
    }  
    public function store(Request $request) {
        $input = $request->all();        
        $validated = $request->validate([
            'student_id' => 'required',
        ]);
        $mark = new MarkModel($input);

        if($mark->save()) {
            $data = ['message' => "Successfully added mark data", 'status' => 'success', 'code' => '200'];
        } else {
            abort(500);
        }

        return back()->with($data);
    }
    public function delete($id) {
        $mark = MarkModel::where('id', $id)->delete();
        return back();
    }    
    public function editCreate($id) {
        $marks = MarkModel::where('id', $id)->first();
        $data = ['marks' => $marks];

        return response()->json($data);
    }
    public function editSubmit(Request $request) {

        $input = $request->all(); 
        $mark_id = request('id');
        $validated = $request->validate([
            'student_id' => 'required',            
        ]);

        $mark = MarkModel::find($mark_id);    

        if( $mark->fill($input)->save()) {
            $data = ['message' => "Successfully updated mark data", 'status' => 'success', 'code' => '200'];
        } else {
            abort(500);
        }

        return back()->with($data);
    }    

}
