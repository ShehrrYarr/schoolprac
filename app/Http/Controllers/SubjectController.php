<?php

namespace App\Http\Controllers;
use App\models\Subject;


use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function addSubjectPage(){
        return view('subjects.addSubject');
    }

    public function storeSubject(Request $request){
        //    dd($request->all());

   
    try{

            $subject = new Subject();
        $subject->name = $request->name;
       
        $subject->save();
        return redirect()->back()->with('success','Subject Added Successfully');

        }
        catch(\Exception $e){
            return redirect()->back()->with($e,'something Went wrong ');
        }
        
    
    }

    public function showAllSubjects(){
        $subjects = Subject::all();
        // dd($subjects);

        return view('subjects.showAllSubjects',compact('subjects'));
    }


     public function getSubjectId($id){

    $subject = Subject::find($id);
        if(!$subject){
            return response()->json(['error' => 'Subject not Found']);
        }
        return response()->json(['result' => $subject]);
    
    }

    public function updateSubject(Request $request){
        // dd($request->all());
        $subject = Subject::find($request->id);
        // dd( $subject);
        $subject->name = $request->name;
        $subject->save();
        return redirect()->back()->with('success','Subject Updated successfully');
    }
}
