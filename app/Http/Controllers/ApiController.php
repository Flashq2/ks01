<?php

namespace App\Http\Controllers;

use App\Models\CourseModels;
use App\Models\CourseTransaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCourse(Request $request){
        try{
            $limit = 30;
            if(isset($request->limite)) $limit = $request->limite;
            $records = CourseModels::limit($limit)->get();
            return response()->json([
                'records' => $records ,
            ]); 
        }catch(Exception $ex){
            return response()->json([
                'status' => '200',
                'msg' => $ex->getMessage()
            ]);
        }
    }

    public function getAllCourse(Request $request){
        try{
            $limit = 30;
            if(isset($request->limite)) $limit = $request->limite;
            $record = CourseModels::limit($limit)->get();
            return response()->json([
                'status' => 'success',
                'records' => $record ,
            ]); 
        }catch(Exception $ex){
            return response()->json([
                'status' => '200',
                'msg' => $ex->getMessage()
            ]);
        }
    }
    public function getCourseById(Request $request,$id){
        try{
            $limit = 30;
            if(isset($request->limite)) $limit = $request->limite;
            $record = CourseModels::where('id',$id)->get();
            return response()->json([
                'status' => 'success',
                'records' => $record ,
            ]); 
        }catch(Exception $ex){
            return response()->json([
                'status' => '200',
                'msg' => $ex->getMessage()
            ]);
        }
    }
    public function postCourseById(Request $request){
        $data = $request->all() ;
        $course = CourseModels::where('id',$data['data']['course_id'])->first();
        $record = new CourseTransaction();
        $record->course_code = $data['data']['course_id'] ;
        $record->course_name = $course->description ;
        $record->price = $course->price ;
        $record->buyer_id = 1 ;
        $record->buyer_name = 'Pok Puthea' ;
        $record->posting_date = Carbon::now()->toDateString() ;
        $record->save() ;
        return response()->json(['status' => 'success' ,'msg' => $data['data']['course_id']]);
    }
}
