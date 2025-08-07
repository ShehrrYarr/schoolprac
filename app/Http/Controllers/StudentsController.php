<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Students;
use App\models\Subject;


class StudentsController extends Controller
{
    public function createStudentPage(){
        $subjects = Subject::all();
        return view('addStudentPage',compact('subjects'));
    }

    public function storeStudent(Request $request){
    //    dd($request->all());

    // $students = Students::all();

    $checkStudent = Students::where('name',$request->name)->where('parent_name',$request->parent_name)->exists();
    // dd($checkStudent);
    if($checkStudent){
        return redirect()->route('showallstudents')->with('danger','Student Already Exists');
    }
    try{

            $student = new Students();
        $student->name = $request->name;
        $student->parent_name = $request->parent_name;
        $student->p_mobile_no = $request->p_mobile_no;
        $student->class = $request->class;
        // $student->subjects = $request->subjects;
        $student->subject_id = $request->subject_id;
        $student->save();
        return redirect()->route('showallstudents')->with('success','Student Added Successfully');

        }
        catch(\Exception $e){
            return redirect()->back()->with($e,'something Went wrong ');
        }
        
    

    }

    public function showAllStudents(){
        // is variable me sary students store hen 
        $subjects= Subject::all();
        // dd($subjects);
        $students = Students::with('subject')->get();
        // dd($students);
        
        return view('showAllStudents',compact('students','subjects'));
    }





    public function getStudentId($id){

       $student = Students::find($id);

       return view('editStudentPage',compact('student'));
    }

    public function updateStudent(Request $request){
        // dd($request->all()); 

        $student = Students::find($request->id);
        $student->name = $request->name;
        $student->parent_name = $request->parent_name;
        $student->p_mobile_no = $request->p_mobile_no;
        $student->class = $request->class;
        $student->subject_id = $request->subject_id;
        $student->save();

         return redirect()->back()->with('success','Student Updated Successfuly');
    }
    public function deleteStudent($id){
        // dd($id);
        $student= Students::find($id);
        $student->delete();
         return redirect()->route('showallstudents')->with('danger','Student Deleted Successfully');

    }

    public function editAjex($id){
        $student = Students::with('subject')->find($id);
        if(!$student){
            return response()->json(['error' => 'Student not Found']);
        }
        return response()->json(['result' => $student]);
    }

    public function deleteAjex(Request $request){
        // dd($request->all());
        $student = Students::find($request->id);
         if(!$student){
            return response()->json(['error' => 'Student not Found']);
        }
        $student->delete();
        return redirect()->back()->with('success', 'Student Deleted Successfully');
    }
    public function heloWorld(){
        return view('heloWorld');
    }
}
